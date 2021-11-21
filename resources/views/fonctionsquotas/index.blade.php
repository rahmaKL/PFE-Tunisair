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

              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th>ID# Fonction</th>
                    <th>Type</th>
                    <th>Nombre</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="">
                    <td>{{$item->id}}# {{$item->fonction->nom}} </td>
                    <td>{{ $data->g_type[$item->quota_id] }}</td>
                    <td>{{$item->nombre}}</td>
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