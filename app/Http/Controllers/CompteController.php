<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\User;
use Illuminate\Http\Request;
use App\Quota;
use App\Fonction;
use App\FonctionQuota;

class CompteController extends GeneralController
{  // les champs changeables 
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Comptes';
        $this->data->title2 = 'Nouveau Compte';
        $this->data->title3 = 'Gestion des Comptes';
        $this->data->title_show = 'Mes informations personnels';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->getVars();
        $this->data->items = User::latest()->paginate(4);
        return view('compte.index', ["data" => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->getVars();
        $this->data->fonctions = Fonction::all(['id', 'nom']);
        // $c = collect(new Item);
        // $c = Collection::make(new Item);
        // $thiss->data->item = User::create();
        return view('compte.create', ["data" => $this->data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:55',
            'login' => 'required|digits:5|unique:users',
            'password' => 'required|confirmed',
            'profil' => 'required',
            'fonction' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));
        // creation d'une ligne dans la bd
        $item = User::create($data);
        // set Quotas 
        $compte_id = $item->id;
        $data = FonctionQuota::where('fonction_id', '=', $item->fonction)->get();
        for ($i = 0; $i < count($data); $i++) {
            $itemFonctionQuota = $data[$i];
            $itemQuota = [];
            $itemQuota['user_id'] = $compte_id;
            $itemQuota['type'] = $itemFonctionQuota->quota_id;
            $itemQuota['nombre'] = $itemFonctionQuota->nombre;
            $itemQuota = Quota::create($itemQuota);
        }
        // $itemQuota = new Quota;
        $this->data->users = User::all(['id', 'name']);
        return redirect()->route('comptes.index')
            ->with('success', 'Compte sauvegarder avec succées');
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
        $this->data->item = User::find($id);
        return view('compte.show',  ["data" => $this->data]);
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
        $this->data->item = User::find($id);
        // $this->data->item->password_decript = Crypt::decrypt($this->data->item->password);
        // $encrypted = Crypt::decryptString($this->data->item->password);
        // dd($encrypted);
        $this->data->fonctions = Fonction::all(['id', 'nom']);
        // dd($this->data->fonctions);
        return view('compte.edit', ["data" => $this->data]);
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
        $this->getVars();
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'login' => 'required|digits:5',
            'password' => 'confirmed',
            'profil' => 'required',
            'fonction' => 'required'
        ]);
        $data = $request->all();

        $item = User::find($id);
        if (!empty($request->get('password'))) {
            $data['password'] = bcrypt($request->get('password'));
        } else {
            $data['password'] = $item->password;
        }
        $item->update($data);
        return redirect()->route('comptes.index')
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
        $id = $request->route('id');
        User::destroy($id);
        return redirect()->route('comptes.index')
            ->with('success', 'Member deleted successfully');
    }
}
