<?php

namespace App\Http\Controllers;

use App\User;
use App\Quota;
use App\Justificatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class JustificatifController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Justificatifs';
        $this->data->title2 = 'Nouveau Justificatif';
        $this->data->title3 = 'Gestion des Justificatifs';
        $this->data->route_prefix = 'justificatifs';
        $this->view_folder = 'justificatifs';
        $this->validators = [
            'fichier' => 'required',
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
        $this->data->items = Justificatif::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(2);
        if ($this->isAdmin() or $this->isAgent()) {
            $ids = User::where('name', 'like', '%' . $this->data->filter_name . '%')->pluck('id')->toArray();
            $this->data->items = Justificatif::whereIn('user_id', $ids)->orderBy('id', 'DESC')->paginate(2);
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
        $this->data->item = new Justificatif;
        $this->data->item->email = Auth::user()->email;
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
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['fichier'] = $this->uploadfile('fichier', 'fichiers/', Auth::user()->id);
        Justificatif::create($data);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->getVars();
        $this->data->item = Justificatif::find($id);
        if ($this->data->profil_id == 1 or $this->data->profil_id == 2) {
            $this->data->item->etat = 2;
            $this->data->item->save();
        }
        return view($this->view_folder . '.show', ["data" => $this->data]);
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
        $this->data->item = Justificatif::find($id);
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
        $item = Justificatif::find($id);
        $this->getVars();
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('fichier')) {
            $data['fichier'] = $this->uploadfile('fichier', 'fichiers/', Auth::user()->id);
        }
        $item->update($data);
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
        Justificatif::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
    public function send(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = Justificatif::find($id);
        $item->etat = 2;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }

    public function valider(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = Justificatif::find($id);
        $item->etat = 2;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }

    public function refuser(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = Justificatif::find($id);
        $item->etat = 3;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }
}
