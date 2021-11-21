<header id="header">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="index.html">Charte</a></li>
                    <li><a href="{{ route('reservations.index')}}">Réserver& Acheter</a></li>
                    <li><a href="{{ route('reclamations.index')}}">Réclamations</a></li>
                    <li class="menu-has-children"><a href="">Mon compte</a>
                        <ul>
                            <li><a href="{{ route('comptes.show', Auth::user()->id)}}">Informations personnelles</a></li>
                            <li><a href="{{ route('quotas.index')}}">Quota </a></li>
                            <li><a href="{{ route('justificatifs.index')}}">Pièces justificatives</a></li>
                            <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out pull-right"></i> Deconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        </ul>
                    </li>


                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->