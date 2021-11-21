<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Quota;
use App\Reservation;
use App\Vol;
use App\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ReservationController extends GeneralController
{
    public function getVars()
    {
        parent::getVars();
        $this->data->title1 = 'Reservations';
        $this->data->title2 = 'Nouveau Reservation';
        $this->data->title3 = 'Gestion des Reservations';
        $this->data->route_prefix = 'reservations';
        $this->view_folder = 'reservations';
        $this->validators = [
            'type' => 'required',
            'depart' => 'required',
            'retour' => 'required',
            'de' => 'required',
            'a' => 'required',
        ];
        $this->data->pays = Pays::distinct()->get(['id', 'cityName']);
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
        $this->data->items = Reservation::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
        if ($this->isAdmin() or $this->isAgent()) {
            $ids = User::where('name', 'like', '%' . $this->data->filter_name . '%')->pluck('id')->toArray();
            $this->data->items = Reservation::whereIn('user_id', $ids)->orderBy('id', 'DESC')->paginate(5);
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
        $this->data->item = new Reservation;
        $this->data->item->depart = date('Y-m-d');
        $this->data->item->retour = date('Y-m-d');
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
        if (strtotime($request->input('depart')) < strtotime(date('Y-m-d'))) {
            return Redirect::back()->withErrors(['La date de depart est invalide !']);
        }
        if (strtotime($request->input('retour')) < strtotime($request->input('depart'))) {
            return Redirect::back()->withErrors(['La date de retour doit etre apres la date de depart !']);
        }
        $user_id = Auth::user()->id;
        $type = $request->input('type');
        $quota = Quota::where('user_id', '=', $user_id)
            ->where('type', '=', $type)
            ->first();

        // verification quota 
        if (!$quota or $quota->nombre < 1) {
            return Redirect::back()->withErrors(['Quota non valide pour ce type de billet !']);
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $item = Reservation::create($data);
        return redirect()->route($this->data->route_prefix . '.vols', $item->id)
            ->with('success', 'Opération terminée avec succées');
    }


    public function edit($id)
    {
        $this->getVars();
        $this->data->item = Reservation::find($id);
        $this->data->users = User::all(['id', 'name']);
        return view($this->view_folder . '.edit', ["data" => $this->data]);
    }


    public function update(Request $request, $id)
    {
        $item = Reservation::find($id);
        $this->getVars();
        request()->validate(
            $this->validators
        );
        // cpt user courant 
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

    public function destroy(Request $request)
    {
        $this->getVars();
        $id = $request->route('id');
        Reservation::destroy($id);
        return redirect()->route($this->view_folder . '.index')
            ->with('success', 'Member deleted successfully');
    }





    public function vols($id, Request $request)
    {
        $this->getVars();
        $itemReservation = Reservation::find($id);
        $this->data->itemReservation = $itemReservation;
        // vols aller 
        $this->data->itemsAller = Vol::all()
            ->where('de', '=', $itemReservation->de)
            ->where('a', '=', $itemReservation->a)
            ->where('date', '>=', $itemReservation->depart . ' 00:00:00')
            ->where('date', '<=', $itemReservation->depart . ' 23:59:59');
        // vols retour  
        $this->data->itemsRetour = Vol::all()
            ->where('a', '=', $itemReservation->de)
            ->where('de', '=', $itemReservation->a)
            // ->where('date', '>=', $itemReservation->retour . " 00:00:00")
            ->where('date', '>=', $itemReservation->retour . ' 00:00:00')
            ->where('date', '<=', $itemReservation->retour . ' 23:59:59');
        return view($this->view_folder . '.vols', ["data" => $this->data]);
    }
    public function reserver(Request $request)
    {
        $this->getVars();
        request()->validate(
            [
                'vol_depart' => 'required',
                'vol_retour'
                => 'required'
            ]
        );
        $depart = $request->input('vol_depart');
        $retour = $request->input('vol_retour');
        $id = $request->route('id');
        $itemReservation = Reservation::find($id);
        $itemReservation->vol_depart = $depart;
        $itemReservation->vol_retour = $retour;
        $itemReservation->etat = 2;
        $itemReservation->save();
        return redirect()->route($this->view_folder . '.paiement', $itemReservation->id)
            ->with('success', 'Opération terminée avec succées !');
    }
    public function paiement($id, Request $request)
    { //interface paiement
        $this->getVars();
        $item = Reservation::find($id);
        $this->data->montant = $item->volDepart->tarif + $item->volRetour->tarif;
        $this->data->item = $item;
        return view($this->view_folder . '.paiement', ["data" => $this->data]);
    }
    public function payer(Request $request)
    { // click button "payer" 
        $this->getVars();
        request()->validate(
            [
                'nom' => 'required',
                'prenom' => 'required',
                'num' => 'required',
                'date' => 'required',
                'cvc2' => 'required',
                'email' => 'required',
            ]
        );
        $id = $request->route('id');
        $item = Reservation::find($id);
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
        return redirect()->route($this->view_folder . '.ticket', $item->id)
            ->with('success', 'Transaction terminée avec succées !');
    }
    public function ticket($id, Request $request)
    {  //affichage billet 
        $this->getVars();
        // id reservation 
        $item = Reservation::find($id);
        $this->data->item = $item;
        return view($this->view_folder . '.ticket', ["data" => $this->data]);
    }
}
