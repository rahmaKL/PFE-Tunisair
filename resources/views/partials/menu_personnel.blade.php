<li><a href="#"> Contact</a></li>
<li><a href="{{ route('reclamations.index')}}"> </i> Reclamation</a></li>
<li @if ($data->menu == 'demandes') class="active" @endif ><a href="{{ route('reservations.index')}}"> Reserver & Acheter </a></li>
<li @if ($data->menu == 'demandes') class="active" @endif ><a href="{{ route('demandes.index')}}"> </i>Charte </a></li>