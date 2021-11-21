{{ $profil = Session::get('profil') }}
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home')}}" class="site_title"><i class="fa fa-plane"></i> <span>Tunisair</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile profile_{{ Auth::user()->profil }} clearfix">
            <div class="profile_pic">
                <img src="/images/logo1.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span> {{$data->profil}},</span>
                <h2> {{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                @if( $data->profil_id == 1)
                @include('partials.menu_admin')
                @elseif( $data->profil_id == 2 )
                @include('partials.menu_profil2')
                @elseif($data->profil_id == 3 )
                @include('partials.menu_profil3')
                @endif
            </div>
        </div>
        <!-- /sidebar menu -->
       
    </div>
</div>