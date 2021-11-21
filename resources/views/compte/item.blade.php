@extends('template.base')
@section('title') {{ $data->title2 }} | {{ $data->item->id }} @endsection
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
                            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label for="nom" class="control-label col-md-3 col-sm-3 col-xs-12">Nom</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" class="form-control" id="nom"  name="nom" placeholder="Nom" value="{{item.nom}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="prenom" class="control-label col-md-3 col-sm-3 col-xs-12">Prenom</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" class="form-control" id="prenom"  name="prenom" placeholder="Prenom" value="{{item.prenom}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="login" class="control-label col-md-3 col-sm-3 col-xs-12">Login</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" class="form-control" id="login"  name="login" placeholder="Login" value="{{item.login}}">
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <label for="mp" class="control-label col-md-3 col-sm-3 col-xs-12">Mot de passe</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required type="password" class="form-control" id="mp"  name="mp" placeholder="Mot de passe" value="{{item.mp}}">
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input required type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{item.email}}">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="profil" class="control-label col-md-3 col-sm-3 col-xs-12">Profil</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select   required class="form-control" id="profil" name="profil">
                                            {% for val in data.g_profil %}
                                                <option value="{{ loop.index }}" 
                                                        {% if loop.index == item.profil %}
                                                            selected="selected"
                                                        {% endif %}
                                                        >{{val}}</option>
                                            {% endfor %}
                                        </select>
                                    </div>
                                </div>



                                <input type="hidden" id="id" name="id" value="{{item.id}}"/>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ path("home")}}users" class="btn btn-primary" type="button">Annuler</a>
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