@extends('template.base')
@section('title') Nouveau @endsection
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$data->title2}}</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        @include('partials.msg')
                        <form action="{{ route('comptes.store') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Nom et Prénom</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input required type="text" class="form-control" id="name" name="name" placeholder="Nom et Prénom" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Adresse E-mail</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="login" class="control-label col-md-3 col-sm-3 col-xs-12">Matricule</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="login" type="login" class="form-control" name="login" value="{{ old('login') }}" required placeholder="Matricule">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fonction" class="control-label col-md-3 col-sm-3 col-xs-12">Fonction</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required class="form-control" id="fonction" name="fonction">
                                        @foreach ($data->fonctions as $val)
                                        <option value="{{$val->id}}">
                                            {{$val->nom}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="objet" class="control-label col-md-3 col-sm-3 col-xs-12">Mot de passe</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mp" class="control-label col-md-3 col-sm-3 col-xs-12">Comfirmer mot de passe</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profil" class="control-label col-md-3 col-sm-3 col-xs-12">Profil</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required class="form-control" id="profil" name="profil">

                                        <option value="1">
                                            Administrateur
                                        </option>
                                        <option value="2">
                                            Agent Responsable
                                        </option>
                                        <option value="3">
                                            Personnel
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/items" class="btn btn-primary" type="button">Annuler</a>
                                    <button class="btn btn-primary" type="reset">Effacer</button>
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

@endsection