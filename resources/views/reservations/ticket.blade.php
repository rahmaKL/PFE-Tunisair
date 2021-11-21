@extends($data->template.'.base')
@section('title') {{$data->title2}} | {{ $data->item->id }} @endsection
@section('body')
<!-- page content -->
<div class="right_col" role="main">

    <div class="ticket">
        <div class="row">
            <div class="col-md-9">
                <h1>{{Auth::user()->name}}</h1>
            </div>
            <div class="col-md-3">
                <p><strong>BOARDING PASS</strong></p>
            </div>
        </div>
        <div class="row ticket-body">
            <div class="col-md-3 ticket-col ticket-border">
                <label class="ticket-time" for="">{{ date('H:i', strtotime($data->item->volDepart->date)) }}</label>
                <label class="ticket-date" for="">{{ date('j F, Y', strtotime($data->item->volDepart->date)) }}</label>
            </div>
            <div class="col-md-3 ticket-col ticket-from">
                <label class="ticket-label" for="">From</label>
                <label class="ticket-pays" for="">{{ $data->item->paysDe->cityCode }}</label>
                <label class="ticket-aerport" for="">{{ $data->item->paysDe->name }}</label>
            </div>
            <div class="col-md-2 ticket-col ticket-fly">
                <i class="fa fa-plane"> </i>
            </div>
            <div class="col-md-3 ticket-col ticket-to ">
                <label class="ticket-label" for="">TO</label>
                <!-- appel model reservat -- paysA fonction trecuperi mn table pays city code -->
                <label class="ticket-pays" for="">{{ $data->item->paysA->cityCode }}</label>
                <label class="ticket-aerport" for="">{{ $data->item->paysA->name }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 code-a-barre">
            </div>

            <div class="col-md-2 col-md-offset-2 ticket-flight">
                <label class="ticket-label" for="">FLIGHT</label>
                <h1>{{ $data->item->paysDe->countryCode }}</h1>
            </div>
            <div class="col-md-2">
                <label class="ticket-label" for="">SEAT</label>
                <h1>19A</h1>
            </div>
            <div class="col-md-2">
                <label class="ticket-label" for="">GATE</label>
                <h1>TEST</h1>
            </div>
        </div>
    </div>
    <div class="ln_solid"></div>
    <br />
    <div class="form-group">
        <div class="offset-md-6 col-md-1">
            <a class="btn btn-success" href="javascript:window.print()">Imprimer</a>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection