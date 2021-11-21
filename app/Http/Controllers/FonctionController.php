<?php

namespace App\Http\Controllers;

use App\User;
use App\Quota;
use App\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FonctionController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->menu = 'billet';
        $this->data->title1 = 'Fonctions';
        $this->data->title2 = 'Nouveau Fonction';
        $this->data->title3 = 'Gestion des Fonctions';
        $this->data->route_prefix = 'fonctions';
        $this->view_folder = 'fonctions';
        $this->validators = [
            'nom' => 'required|unique:fonctions',
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
        $this->data->items = Fonction::orderBy('id', 'DESC')->paginate(5);
        // $this->data->items = Fonction::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
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
        $this->data->item = new Fonction;
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
        $data['date'] = date("Y-m-d");
        Fonction::create($data);
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
        $this->data->item = Fonction::find($id);
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
        $this->data->item = Fonction::find($id);
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
        $item = Fonction::find($id);
        $this->getVars();
        request()->validate(
            $this->validators
        );
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $quota = Quota::where('user_id', '=', $user_id)
            ->where('type', '=', $type)
            ->first();
        if (!$quota or $quota->nombre < 1) {
            return Redirect::back()->withErrors(['Quota non valide pour ce type de billet !']);
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
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
        Fonction::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
}
