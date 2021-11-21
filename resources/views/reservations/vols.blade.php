@extends($data->template.'.base')
@section('title') Comptes @endsection
@section('body')
<div class="right_col" role="main">
  <div class="title_left">
    <h3>{{$data->title3}} <small></small></h3>
  </div>
  <div class="clearfix"></div>
  @include('partials.msg')
  <form action="{{ route($data->route_prefix.'.reserver', $data->itemReservation->id) }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="">

    <div class="row">
      {{ csrf_field() }}

      <div class="col-md-6">
        Aller : <h3>{{$data->itemReservation->paysDe->cityName}} - {{$data->itemReservation->paysA->cityName}} </h3>
        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th>Aerpot Départ</th>
              <th>Aerpot Arrivé</th>
              <th>Date</th>
              <th>Tarif</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data->itemsAller as $item)
            <tr class="">
              <td>{{$item->paysDe->name}}</td>
              <td>{{$item->paysA->name}}</td>
              <td>{{ date('Y-m-d H:i', strtotime($item->date)) }}</td>
              <td>{{$item->tarif}} DNT</td>
              <td> <input type="radio" class="form-check-input" name="vol_depart" value="{{$item->id}}"> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- end project list -->
      </div>

      <div class="col-md-6">
        Retour : <h3>{{$data->itemReservation->paysA->cityName}} - {{$data->itemReservation->paysDe->cityName}} </h3>

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th>Aerpot Départ</th>
              <th>Aerpot Arrivé</th>
              <th>Date</th>
              <th>Tarif</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data->itemsRetour as $item)
            <tr class="">
              <td>{{$item->paysDe->name}}</td>
              <td>{{$item->paysA->name}}</td>
              <td>{{ date('Y-m-d H:i', strtotime($item->date)) }}</td>
              <td>{{$item->tarif}} DNT</td>
              <td> <input type="radio" class="form-check-input" name="vol_retour" value="{{$item->id}}"> </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <!-- end project list -->
      </div>
      <div class="col-md-12">
        <div class="ln_solid"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Reserver</button>
        </div>
      </div>
    </div>
  </form>



</div>
<!-- /page content -->
@endsection