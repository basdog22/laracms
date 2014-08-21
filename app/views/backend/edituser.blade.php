
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'users/saveuser', 'class'=>'form-edituser')) }}
        <h2 class="form-signin-heading">{{ Lang::get('strings.edit_user') }}</h2>
        {{ Form::hidden('userid', $user->id) }}
        {{ Form::label('firstname',Lang::get('strings.firstname')) }}
        {{ Form::text('firstname', $user->firstname, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.firstname'))) }}
        {{ Form::label('lastname',Lang::get('strings.lastname')) }}
        {{ Form::text('lastname', $user->lastname , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.lastname'))) }}
        {{ Form::label('email',Lang::get('strings.email')) }}
        {{ Form::email('email', $user->email , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.email'))) }}
        {{ Form::label('password',Lang::get('strings.password')) }}
        {{ Form::password('password', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.password'))) }}
        <div class="checkbox-inline">
            <label>
                {{ Form::checkbox('is_admin', 1,$user->is_admin) }} @lang('strings.isadmin')
                <i class="fa fa-square-o"></i>
            </label>
        </div>
        {{ Form::submit(Lang::get('strings.save_user'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

