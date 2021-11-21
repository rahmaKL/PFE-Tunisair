<ul class="nav side-menu">
    <li @if ($data->menu == 'demandes') class="active" @endif ><a href="{{ route('justificatifs.index')}}"><i class="fa fa-user"></i>Justificatifs </a></li>
    <li @if ($data->menu == 'demandes') class="active" @endif ><a href="{{ route('reservations.index')}}"><i class="fa fa-ticket"></i>Historique des Reservations </a></li>

    <li @if ($data->menu == 'reclamations') class="active" @endif ><a href="{{ route('reclamations.index')}}"><i class="fa fa-bullhorn"></i> Reclamations @if ($data->count_msg > 0) <span class="label label-success ">{{$data->count_msg}}</span>@endif </a></li>
    <li @if ($data->menu == 'quota') class="active" @endif ><a href="{{ route('quotas.index')}}"><i class="fa fa-bullhorn"></i>Quotas  </a></li>
    
</ul>