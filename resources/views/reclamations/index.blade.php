@extends($data->template.'.base')
@section('title') Comptes @endsection
@section('body')
@include('partials.confirm')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Réclamations <small></small></h3>
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
                    <th>E-mail</th>
                    <th width="15%">Sujet</th>
                    <th>Date</th>
                    <th>Etat</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="reclamation_{{$item->etat}}">
                    @if($data->profil_id == 1)
                    <td>{{$item->user->name}}</td>
                    @endif
                    <td>{{$item->email}}</td>
                    <td>{{$item->sujet}}</td>
                    <td>{{$item->date}}</td>
                    <td>
                      @php ($label = [
                      1 => "label-default badge-secondary",
                      2 => "label-warning badge-warning",
                      3 => "label-success badge-success",
                      ])
                      <span class="label {{$label[$item->etat]}}">{{$data->g_etatReclamation[$item->etat]}}</span>
                    </td>
                    <td>
                      @if($item->etat == 1 && ($data->profil_id == 1 or $data->profil_id == 2))
                      <a class="btn btn-warning btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/demarrer" data-toggle="modal" data-target="#confirm-demarrer"><i class="fa fa-edit"></i> Demarrer</a>
                      @endif
                      @if($item->etat == 2 && ($data->profil_id == 1 or $data->profil_id == 2))
                      <a class="btn btn-success btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/cloturer" data-toggle="modal" data-target="#confirm-cloturer"><i class="fa fa-close"></i> Cloturer</a>
                      @endif
                      <a class="btn btn-primary btn-xs" href="{{ route($data->route_prefix.'.show',$item->id) }}"><i class="fa fa-eye"></i> Consulter</a>
                      @if($item->etat == 1 && $data->profil_id == 3)
                      <a class="btn btn-info btn-xs" href="{{ route($data->route_prefix.'.edit',$item->id) }}"><i class="fa fa-edit"></i> Modifier</a>
                      <a class="btn btn-danger btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/destroy" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove"></i> Supprimer</a>
                      @endif
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