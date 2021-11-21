@extends('template.base')
@section('title') Comptes @endsection
@section('body')
@include('partials.confirm')

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{$data->title3}} <small></small></h3>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              @include('partials.msg')
              <div class="nav navbar-right panel_toolbox">
                <a class="btn btn-app" href="{{ route($data->route_prefix.'.create') }}"><i class="fa fa-plus"> </i> Nouveau</a>
              </div>
              @if($data->profil_id == 1)
              <form class="form-inline" action="{{ route('quota.filter') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate>
                {{ csrf_field() }}

                <div class="form-group mx-sm-3 mb-2">
                  <label for="filter_nom" class="control-label">Nom</label>
                  <select required class="form-control" id="filter_user_id" name="filter_user_id">
                    <option value="0">Filtrer par nom</option>
                    @foreach ($data->users as $value)
                    <option value="{{$value->id}}">
                      {{$value->id}}# {{$value->name}}
                    </option>
                    @endforeach
                  </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search"></i></button>
              </form>
              @endif
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    @if($data->profil_id == 1)
                    <th>Personnel</th>
                    @endif
                    <th>Type</th>
                    <th>Nombre</th>
                    <th>Etat</th>
                    <th>Date de la demande</th>
                    <th>Date de validation</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="">
                    @if($data->profil_id == 1)
                    <th>{{$item->user->name}}</th>
                    @endif
                    <td>{{ $data->g_type[$item->quota->type] }}</td>
                    <td>{{$item->nombre}}</td>
                    <td>
                      @php ($label = [
                      1 => "label-default",
                      2 => "label-default",
                      3 => "label-default",
                      4 => "label-success",
                      5 => "label-primary",
                      ])
                      <span class="label {{$label[$item->etat]}}">{{$data->g_etat[$item->etat]}}</span>
                    </td>
                    <td>{{$item->date_demande}}</td>
                    <td>{{$item->date_validation}}</td>
                    <td>
                      <a class="btn btn-info btn-xs" href="{{ route($data->route_prefix.'.edit',$item->id) }}"><i class="fa fa-edit"></i> Modifier</a>
                      <a class="btn btn-danger btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/destroy" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove"></i> Supprimer</a><br>
                    </td>
                  </tr>
                  @endforeach


                </tbody>
              </table>
              {!! $data->items->render() !!}
              <!-- end project list -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
  @endsection