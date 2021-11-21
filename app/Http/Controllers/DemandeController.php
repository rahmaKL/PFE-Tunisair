<?php

namespace App\Http\Controllers;

use App\User;
use App\Quota;
use App\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class DemandeController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Demandes';
        $this->data->title2 = 'Nouveau Demande';
        $this->data->title3 = 'Gestion des Demandes';
        $this->data->route_prefix = 'demandes';
        $this->view_folder = 'demandes';
        $this->validators = [
            'nombre' => 'required',
            'user_id' => 'required',
            'quota_id' => 'required',
            'justificatif1' => 'file|max:1024',
            'justificatif2' => 'file|max:1024',
            'justificatif3' => 'file|max:1024',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->getVars();
        $this->data->users = User::all(['id', 'name']);
        $this->data->filter_name =  $request->input('filter_nom');
        $this->data->items = Demande::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        if ($this->isAdmin()) {
            $ids = User::where('name', 'like', '%' . $this->data->filter_name . '%')->pluck('id')->toArray();
            $this->data->items = Demande::whereIn('user_id', $ids)->orderBy('id', 'DESC')->paginate(10);
        }
        return view($this->view_folder . '.index', ["data" => $this->data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getVars();
        $this->data->item = new Demande;
        $this->data->users = User::all(['id', 'name']);
        // $thiss->data->item = User::create();
        return view($this->view_folder . '.create', ["data" => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->getVars();
        request()->validate(
            $this->validators
        );
        //--------------------------------------------------------------
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $nombre = $request->input('type');
        $data = Quota::where('user_id', '=', $user_id)
            ->where('type', '=', $type)
            ->first();
        if (!$data or $data->nombre < $nombre) {
            return Redirect::back()->withErrors(['Quota non valide pour ce type de billet !']);
        }
        //--------------------------------------------------------------
        $data = $request->all();
        $data['file'] = $this->uploadfile('file', 'pieces/', Auth::user()->id);
        // -----------------------------------------------------
        Demande::create($request->all());
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Demande $item)
    {
        $this->getVars();
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->getVars();
        $this->data->item = Demande::find($id);
        $this->data->users = User::all(['id', 'name']);
        return view($this->view_folder . '.edit', ["data" => $this->data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Demande::find($id);
        $this->getVars();
        request()->validate(
            $this->validators
        );
        $item->update($request->all());
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        Demande::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
}
