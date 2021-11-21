<ul class="nav side-menu">
    <li @if ($data->menu == 'demandes') class="active" @endif ><a href="{{ route('justificatifs.index')}}"><i class="fa fa-user"></i>Justificatifs </a></li>
    <li @if ($data->menu == 'reclamations') class="active" @endif ><a href="{{ route('reclamations.index')}}"><i class="fa fa-bullhorn"></i> Reclamations @if ($data->count_msg > 0) <span class="label label-success ">{{$data->count_msg}}</span>@endif </a></li>
    <li @if ($data->menu == 'logs') class="active" @endif><a><i class="fa fa-file"></i> Billet <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="{{ route('quotas.index')}}">Quota </a></li>
        </ul>
    </li>
</ul>