@extends('template.base')
@section('title') {{$data->title2}} | {{ $data->item->id }} @endsection
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
                        <form action="{{ route($data->route_prefix.'.update', $data->item->id) }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{method_field('PATCH')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Compte</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select disabled required class="form-control" id="user_id" name="user_id">
                                        @foreach ($data->users as $value)
                                        <option @if ($value->id == $data->item->id)
                                            selected="selected"
                                            @endif
                                            value="{{$value->id}}">
                                            {{$value->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type" class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select disabled required class="form-control" id="type" name="type">
                                        @foreach ($data->g_type as $id=>$name)
                                        <option @if ($id==$data->item->type)
                                            selected="selected"
                                            @endif
                                            value="{{$id}}">
                                            {{$name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="nombre" type="number" class="form-control" name="nombre" value="{{ $data->item->nombre }}" required placeholder="0">
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