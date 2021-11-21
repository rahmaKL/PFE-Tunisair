<?php

namespace App\Http\Controllers;

use App\User;
use App\Quota;
use App\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Reclamations';
        $this->data->title2 = 'Nouveau Reclamation';
        $this->data->title3 = 'Gestion des Reclamations';
        $this->data->route_prefix = 'reclamations';
        $this->view_folder = 'reclamations';
        $this->validators = [
            'msg' => 'required',
            'email' => 'required',
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
        $this->data->items = Reclamation::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(3);
        if ($this->isAdmin() or $this->isAgent()) {
            $ids = User::where('name', 'like', '%' . $this->data->filter_name . '%')->pluck('id')->toArray();
            $this->data->items = Reclamation::whereIn('user_id', $ids)->orderBy('id', 'DESC')->paginate(3);
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
        $this->data->item = new Reclamation;
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
        // ajout d'une ligne ds BD 
        Reclamation::create($data);
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
    {  // consulter rec 
        $this->getVars();
        $this->data->item = Reclamation::find($id);
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
    { // affichage de l'interf modification (juste modifier sans sauv )
        $this->getVars();
        $this->data->item = Reclamation::find($id);
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
    { // sauvg d modification
        $item = Reclamation::find($id);
        $this->getVars();
        request()->validate(
            $this->validators
        );
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $quota = Quota::where('user_id', '=', $user_id)
            ->where('type', '=', $type)
            ->first();

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        // mise a jour dans BD direct 
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
        Reclamation::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
  

    public function demarrer(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = Reclamation::find($id);
        $item->etat = 2;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }
    public function cloturer(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = Reclamation::find($id);
        $item->etat = 3;
        //fichier data 3 traité 
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }
}
