
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/addmenu', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('strings.new_menu') }}</h2>

            {{ Form::text('menu_title', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.menu_title'))) }}
            {{ Form::text('menu_name', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.menu_name'))) }}

            {{ Form::submit(Lang::get('strings.add_menu'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

