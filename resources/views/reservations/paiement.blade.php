@extends('template.paiement')
@section('title') Paiement @endsection
@section('body')
@include('partials.msg')
<form action="{{ route($data->route_prefix.'.payer' , $data->item->id) }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    {{ csrf_field() }}
    <div class="col-md-12">
        <h2>
            <center> FORMULAIRE DE PAIEMENT</center>
        </h2>
        <p>
            <center>ous êtes en connexion sécurisée avec le serveur de paiement</center>
        </p>
    </div>
    <div class="col-md-12">
        <h2>Données de la transaction</h2>
    </div>

    <div class="form-group">
        <label for="" class="control-label col-md-6 col-sm-3 col-xs-12">Site Marchand :</label>
        <label for="depart" class="control-label col-md-3 col-sm-3 col-xs-12"> <strong>Tunisair</strong></label>
    </div>
    <div class="form-group">
        <label for="" class="control-label col-md-6 col-sm-3 col-xs-12">Montant transaction :</label>
        <label for="depart" class="control-label col-md-3 col-sm-3 col-xs-12"> <strong>{{ $data->montant }} DNT</strong></label>
    </div>
    <div class="form-group">
        <label for="" class="control-label col-md-6 col-sm-3 col-xs-12">Date de la transaction :</label>
        <label for="depart" class="control-label col-md-3 col-sm-3 col-xs-12"> <strong>{{ date('Y-m-d') }}</strong></label>
    </div>
    <div class="form-group">
        <label for="nom" class="control-label col-md-6 col-sm-3 col-xs-12">Nom</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="nom" type="text" class="form-control" name="nom" value=" " required placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="prenom" class="control-label col-md-6 col-sm-3 col-xs-12">Prénom</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="prenom" type="text" class="form-control" name="prenom" value=" " required placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="num" class="control-label col-md-6 col-sm-3 col-xs-12">N° de la carte</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="num" type="text" class="form-control" name="num" value=" " required placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="date" class="control-label col-md-6 col-sm-3 col-xs-12">Date d'expiration</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="date" type="date" class="form-control" name="date" value=" " required placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="cvc2" class="control-label col-md-6 col-sm-3 col-xs-12">Cryptogramme(CVC2)</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="cvc2" type="text" class="form-control" name="cvc2" value=" " required placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-md-6 col-sm-3 col-xs-12">Email</label>
        <div class="col-md-6 col-sm-3 col-xs-12">
            <input id="email" type="email" class="form-control" name="email" value=" " required placeholder="">
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">
            <button type="submit" class="btn btn-success">Payer</button>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
            <img src="{{ asset('template1/img/paiement.png')}}" alt="">
        </div>
    </div>
</form>
@endsection