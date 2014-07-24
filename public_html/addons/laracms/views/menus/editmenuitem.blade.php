
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/savemenuitem', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('strings.edit_menuitem') }}</h2>

            {{ Form::hidden('menuitemid', $menuitem->id) }}
            {{ Form::label(Lang::get('strings.for_menu')) }}
            {{ Form::select('menuid', $menus) }}
            {{ Form::text('url', $menuitem->url, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.url'))) }}
            {{ Form::text('link_text', $menuitem->link_text , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_text'))) }}
            {{ Form::label(Lang::get('strings.link_target')) }}
            {{ Form::select('link_target', array('_self'=>Lang::get('strings.same_window'),'_blank'=>Lang::get('strings.new_window')),$menuitem->link_target) }}
            {{ Form::text('link_attr', $menuitem->link_attr, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_attr'))) }}
            {{ Form::text('link_css', $menuitem->link_css, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_css'))) }}
            {{ Form::text('link_class', $menuitem->link_class, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.link_class'))) }}


            {{ Form::submit(Lang::get('strings.save_menuitem'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

