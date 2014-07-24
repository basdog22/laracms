
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/addmenuitem', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('strings.new_menuitem') }}</h2>

            {{ Form::label(Lang::get('strings.for_menu')) }}
            {{ Form::select('menuid', $menus) }}
            {{ Form::text('url', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.url'))) }}
            {{ Form::text('link_text', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_text'))) }}
            {{ Form::label(Lang::get('strings.link_target')) }}
            {{ Form::select('link_target', array('_self'=>Lang::get('strings.same_window'),'_blank'=>Lang::get('strings.new_window')),'_self') }}
            {{ Form::text('link_attr', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_attr'))) }}
            {{ Form::text('link_css', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_css'))) }}
            {{ Form::text('link_class', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_class'))) }}


            {{ Form::submit(Lang::get('strings.add_menu'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>
