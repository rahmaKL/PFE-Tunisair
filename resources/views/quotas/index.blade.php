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
              @if($data->profil_id == 1 or $data->profil_id == 2)
              <div class="nav navbar-right panel_toolbox">
                <a class="btn btn-app" href="{{ route($data->route_prefix.'.create') }}"><i class="fa fa-plus"> </i> Nouveau</a>
              </div>
              <form class="form-inline" action="{{ route('quota.filter') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate>
                {{ csrf_field() }}

                <div class="form-group mx-sm-3 mb-2">
                  <label for="filter_nom" class="control-label">Nom</label>
                  <input type="text" class="form-control" id="filter_nom" name="filter_nom" placeholder="Filtrer par nom" value="{{$data->filter_name}}">
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
                    <th> Nom</th>
                    <th>Type</th>
                    <th>Quota</th>
                    @if($data->profil_id == 1 or $data->profil_id == 2)

                    <th>Actions</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data->items as $item)
                  <tr class="">
                    <td> {{$item->user->name}} </td>
                    <td>{{$data->g_type[$item->type]}}</td>
                    <td>{{$item->nombre}}</td>
                    @if($data->profil_id == 1 or $data->profil_id == 2)
                    <td>
                      <a class="btn btn-info btn-xs" href="{{ route($data->route_prefix.'.edit',$item->id) }}"><i class="fa fa-edit"></i> Modifier</a>
                      <a class="btn btn-danger btn-xs" href="" data-href="/{{$data->route_prefix}}/{{$item->id}}/destroy" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove"></i> Supprimer</a><br>
                    </td>
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