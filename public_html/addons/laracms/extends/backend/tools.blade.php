<li class="dropdown">
    <a href="#" class="dropdown-toggle account" data-toggle="dropdown">

        <i class="fa fa-angle-down pull-right"></i>
        <div class="user-mini pull-right">
            <span class="welcome">LaraCMS</span>
            <span>{{ Lang::get('strings.tools') }}</span>
        </div>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ url('backend/menus') }}" >
                <i class="fa fa-th-list"></i>
                {{ Lang::get('strings.menus') }}
            </a>
        </li>
    </ul>
</li>