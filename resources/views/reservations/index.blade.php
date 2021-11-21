@extends($data->template.'.base')
@section('title') Comptes @endsection
@section('body')
@include('partials.confirm')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Réservation <small></small></h3>
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
                    <th>De</th>
                    <th>À</th>
                    <th>Depart</th>
                    <th>Retour</th>
                    <th>Type</th>
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
                    <td title="{{$item->paysDe->id}}">{{$item->paysDe->cityName}}</td>
                    <td title="{{$item->paysA->id}}">{{$item->paysA->cityName}}</td>
                    <td>{{$item->depart}}</td>
                    <td>{{$item->retour}}</td>
                    <td>{{ $data->g_type[$item->type] }}</td>
                    <td>
                      @php ($label = [
                      1 => "label-default badge-secondary",
                      2 => "label-warning badge-warning",
                      3 => "label-danger badge-danger",
                      4 => "label-success badge-success",
                      5 => "label-info badge-info",
                      ])
                      <span class="label {{$label[$item->etat]}}">{{$data->g_etat[$item->etat]}}</span>
                    </td>
                    <td>
                      @if($item->etat == 1 )
                      <a class="btn btn-info btn-xs" href="/{{$data->route_prefix}}/{{$item->id}}/vols"><i class="fa fa-thumb-tack"></i> Reserver</a>
                      @endif
                      @if($item->etat == 2 )
                      <a class="btn btn-warning btn-xs" href="/{{$data->route_prefix}}/{{$item->id}}/paiement"><i class="fa fa-paypal"></i> Payer</a>
                      @endif
                      @if($item->etat == 4 )
                      <a class="btn btn-success btn-xs" target="_blank" href="/{{$data->route_prefix}}/{{$item->id}}/ticket"><i class="fa fa-ticket"></i> Billet</a>
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