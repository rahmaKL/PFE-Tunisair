@extends($data->template.'.base')
@section('title') Nouveau @endsection
@section('body')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Nouvelle Réclamation</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        @include('partials.msg')
                        <form action="{{ route($data->route_prefix.'.store') }}" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-reclamation">
                            {{ csrf_field() }}
                            @include($data->route_prefix.'.form')
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route($data->route_prefix.'.index') }}" class="btn btn-info" type="button">Annuler</a>
                                    <button class="btn btn-info" type="reset">Effacer</button>
                                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

@endsection