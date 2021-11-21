@extends($data->template.'.base')
@section('title') Comptes @endsection
@section('body')
@include('partials.confirm')
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
                    @if($data->profil_id == 1)
                    <th>Personnel</th>
                    @endif
                    <th>Sujet</th>
                    <th>Fichier</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="">
                    @if($data->profil_id == 1)
                    <th>{{$item->user->name}}</th>
                    @endif
                    <td>{{$item->sujet}}</td>
                    <td>{{$item->fichier}}</td>
                    <td>
                      @php ($label = [
                      1 => "label-default badge-secondary",
                      4 => "label-warning badge-warning",
                      3 => "label-danger badge-danger",
                      2 => "label-success badge-success",
                      5 => "label-info badge-info",
                      ])
                      <span class="label {{$label[$item->etat]}}">{{$data->g_etatJustificatif[$item->etat]}}</span>
                    </td>
                    <td>
                      @if($item->etat == 1 && ($data->profil_id == 1 or $data->profil_id == 2))
                      <a class="btn btn-success btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/valider" data-toggle="modal" data-target="#confirm-valider"><i class="fa fa-check"></i> Valider</a>
                      @endif
                      @if($item->etat == 1 && ($data->profil_id == 1 or $data->profil_id == 2))
                      <a class="btn btn-danger btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/refuser" data-toggle="modal" data-target="#confirm-refuser"><i class="fa fa-ban"></i> Réfuser</a>
                      @endif
                      <a class="btn btn-primary btn-xs" target="_blank" href="{{ asset('fichiers/'.$item->fichier)}}"><i class="fa fa-eye"></i> Consulter</a>
                      @if($item->etat == 1 )
                      <a class="btn btn-info btn-xs" href="{{ route($data->route_prefix.'.edit',$item->id) }}"><i class="fa fa-edit"></i> Modifier</a>
                      <a class="btn btn-danger btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/destroy" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove"></i> Supprimer</a>
                      @endif
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