<li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-envelope-o"></i>
        @if( (@isset ($data->alertes)) && count($data->alertes) >0 )
        <span class="badge bg-green">{{count($data->alertes)}}</span>
        @endif
    </a>
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu"> </ul>
</li>