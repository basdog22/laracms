<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                {{ HTML::link('/backend/dashboard',Config::get('cms.brand')) }}
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                        {{ Form::open(array('url'=>'backend/search', 'class'=>'form-search')) }}<div id="search">
                            {{ Form::text('search', null, array('placeholder'=>Lang::get('strings.search'))) }}
                            <i class="fa fa-search"></i>

                        </div>{{ Form::close() }}
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            {{ $navtools }}
                            <li class="hidden-xs">
                                <a href="{{ url('addons/manage') }}" >
                                    <i class="fa fa-cogs"></i>
                                    {{ Lang::get('strings.addons') }}
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a class="ajax-link" href="{{ url('themes/manage') }}">
                                    <i class="fa fa-desktop"></i>
                                    {{ Lang::get('strings.themes') }}
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a href="{{ url('users/manage') }}" class="ajax-link">
                                    <i class="fa fa-users"></i>
                                    {{ Lang::get('strings.users') }}
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="http://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" class="img-rounded" alt="avatar" />
                                    </div>
                                    <i class="fa fa-angle-down pull-right"></i>
                                    <div class="user-mini pull-right">
                                        <span class="welcome">{{Lang::get('strings.welcome')}},</span>
                                        <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>

                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ url('users/profile/') }}">
                                            <i class="fa fa-user"></i>
                                            <span class="hidden-sm text">{{ Lang::get('strings.profile')}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('users/messages/') }}" class="ajax-link">
                                            <i class="fa fa-envelope"></i>
                                            <span class="hidden-sm text">{{ Lang::get('strings.messages') }}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('backend/tasks/') }}" class="ajax-link">
                                            <i class="fa fa-envelope"></i>
                                            <span class="hidden-sm text">{{ Lang::get('strings.tasks') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('users/settings/') }}" class="ajax-link">
                                            <i class="fa fa-envelope"></i>
                                            <span class="hidden-sm text">{{ Lang::get('strings.settings') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/users/logout">
                                            <i class="fa fa-power-off"></i>
                                            <span class="hidden-sm text">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>