@extends($data->template.'.base')
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
                <a class="btn btn-app" href="{{ route('comptes.create') }}"><i class="fa fa-plus"> </i> Nouveau</a>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <!-- start project list -->
              <table class="table table-striped projects">
                <thead>
                  <tr>
                    <th>Nom et Prénom</th>
                    <th>Matricule</th>
                    <th>Mail</th>
                    <th>Fonction</th>
                    <th>Profil</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="">
                    <td title="#{{$item->id}}">{{$item->name}}</td>
                    <td>{{$item->login}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{ $item->hisFonction->nom }}</td>
                    <td>
                      @php ($label = [1 => "label-primary",
                      2 => "label-success",
                      3 => "label-default",
                      4 => "label-default",
                      5 => "label-default"
                      ])
                      <span class="label {{$label[$item->profil]}}">{{$data->g_profil[$item->profil]}}</span>
                    </td>
                    <td>
                      <a class="btn btn-info btn-xs" href="{{ route('comptes.edit',$item->id) }}"><i class="fa fa-edit"></i> Modifier</a>
                      <a class="btn btn-danger btn-xs" href="" data-href="/comptes/{{$item->id}}/destroy" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove"></i> Supprimer</a><br>
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