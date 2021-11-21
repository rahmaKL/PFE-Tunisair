@extends('template1.base_login')
@section('title') Connexion @endsection
@section('body')
<div class="row fullscreen align-items-center justify-content-between">
    <div class="offset-md-4 col-lg-4 col-md-6 banner-right formconnexion">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
                <form class="form-wrap" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <input placeholder="Matricule" id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" required autofocus>
                    @if ($errors->has('login'))
                    <span class="help-block">
                        <strong>{{ $errors->first('login') }}</strong>
                    </span>
                    @endif
                    <input placeholder="Mot de passe" id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <button class="primary-btn text-uppercase" type="submit">Connexion <i class="glyphicon glyphicon-log-in"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection