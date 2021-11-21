<?php

namespace App\Http\Controllers;

use App\User;
use App\Quota;
use App\Fonction;
use App\FonctionQuota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FonctionQuotaController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Fonction / Quotas';
        $this->data->title2 = 'Nouveau ';
        $this->data->title3 = 'Fonction / Quotas';
        $this->data->route_prefix = 'fonctionsquotas';
        $this->view_folder = 'fonctionsquotas';
        $this->validators = [
            'fonction_id' => 'required',
            'quota_id' => 'required',
            'nombre' => 'required|integer|min:1',
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
        $this->data->filter_name =  $request->input('filter_nom');
        $this->data->items = FonctionQuota::orderBy('id', 'DESC')->paginate(5);
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
        $this->data->item = new FonctionQuota;
        $this->data->item->email = Auth::user()->email;
        $this->data->fonctions = Fonction::all(['id', 'nom']);
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
            $this->validators,
            [
                'fonction_id.required' => 'Veuillez choisir une fonction!',
                'quota_id.required' => 'Veuillez choisir ule type de billet!'
            ]
        );
        /***********************************************************************/
        $data = FonctionQuota::where('fonction_id', '=', $request->input('fonction_id'))
            ->where('quota_id', '=', $request->input('quota_id'))
            ->first(); // model or null
        if ($data) {
            //$validator = Validator::make();
            // $validator->errors()->add('type', 'Quota déjà attribué pour ce type de billet !');
            //return redirect()->route($this->view_folder . '.create')
            //->with('errors', 'Quota déjà attribué !');            
            return Redirect::back()->withErrors(['Quota déjà attribué pour cette fonction !']);
        }
        /***********************************************************************/
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['date'] = date("Y-m-d");
        FonctionQuota::create($data);
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
        $this->data->item = FonctionQuota::find($id);
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
        $this->data->fonctions = Fonction::all(['id', 'nom']);
        $this->data->item = FonctionQuota::find($id);
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
        $item = FonctionQuota::find($id);
        $this->getVars();
        request()->validate(
            [
                'nombre' => 'required|integer|min:1',
            ]
        );
        $user_id = Auth::user()->id;
        $type = $request->input('type');
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
        FonctionQuota::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }
    public function send(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = FonctionQuota::find($id);
        $item->etat = 2;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }

    public function valider(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = FonctionQuota::find($id);
        $item->etat = 4;
        $item->date_validation = date("Y-m-d");
        $item->save();
        // update quota
        $user_id = $item->user_id;
        $type = $item->type;
        $quota = Quota::where('user_id', '=', $user_id)
            ->where('type', '=', $type)
            ->first();
        if ($quota) {
            $quota->nombre = $quota->nombre - 1;
            $quota->save();
        }
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }

    public function demarrer(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = FonctionQuota::find($id);
        $item->etat = 2;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }
    public function cloturer(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        $item = FonctionQuota::find($id);
        $item->etat = 3;
        $item->save();
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Opération terminée avec succées !');
    }
}
