@extends('template1.base')
@section('title') Infos | {{ $data->item->id }} @endsection
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>{{$data->title_show}}</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        @include('partials.msg')
                        <form action="{{ route('comptes.update', $data->item->id) }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-info">
                            {{method_field('PATCH')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Nom et Prénom</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" class="form-control" id="name" name="name" placeholder="Nom et Prénom" value="{{ $data->item->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fonction" class="control-label col-md-3 col-sm-3 col-xs-12">Fonction</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly type="text" class="form-control" id="fonction" name="fonction" placeholder="" value="{{ $data->item->hisFonction->nom }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Adresse E-mail</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly id="email" type="email" class="form-control" name="email" value="{{ $data->item->email }}"  placeholder="email">
                                </div>
                            </div>
                              
                            <div class="form-group">
                                <label for="login" class="control-label col-md-3 col-sm-3 col-xs-12">Matricule</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input readonly id="login" type="text" class="form-control" name="login" value="{{ $data->item->login }}"  placeholder="Matricule">
                                </div>
                            </div>
                              
                            <div class="form-group">
                                <label for="profil" class="control-label col-md-3 col-sm-3 col-xs-12">Profil</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select disabled  class="form-control" id="profil" name="profil">
                                        @foreach ($data->g_profil as $id=>$name)
                                        <option @if ($id==$data->item->profil)
                                            selected="selected"
                                            @endif
                                            value="{{$id}}">
                                            {{$name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

@endsection