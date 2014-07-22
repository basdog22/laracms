<div id="sidebar-left" class="col-xs-2 col-sm-2">
    <ul class="nav main-menu">
        <li>
            <a href="{{ url('backend/') }}" class="active ajax-link">
                <i class="fa fa-dashboard"></i>
                <span class="hidden-xs">{{ Lang::get('strings.dashboard') }}</span>
            </a>
        </li>
        {{$sidebarmenu}}
    </ul>
</div>