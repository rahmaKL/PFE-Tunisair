@extends($data->template.'.base')
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
                        <form action="{{ route($data->route_prefix.'.update', $data->item->id) }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-justif">
                            {{method_field('PATCH')}}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">e-Mail : </label>
                                <label for="email" class="form-control-static col-md-6 col-sm-6 col-xs-12"><b>{{ $data->item->email }}</b></label>
                            </div>
                            <div class="form-group">
                                <label for="sujet" class="control-label col-md-3 col-sm-3 col-xs-12">Sujet :</label>
                                <label for="email" class="form-control-static col-md-6 col-sm-6 col-xs-12"><b>{{ $data->item->sujet }}</b></label>
                            </div>
                            <div class="form-group">
                                <label for="de" class="control-label col-md-3 col-sm-3 col-xs-12">Message :</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label id="msg" name="msg" placeholder="Ecrivez votre reclamation" class="form-control-static" rows="5" cols="33" required>{{ $data->item->msg }}</label>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

@endsection