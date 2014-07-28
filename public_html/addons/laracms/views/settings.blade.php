<div class="row">
    <div class="col-lg-8 col-lg-offset-2">

        <h2 class="form-signin-heading">{{ Lang::get('strings.settings') }}</h2>

        {{ Form::open(array('url'=>'backend/savesettings', 'class'=>'form-edituser')) }}
        {{ Form::hidden('section', 'laramce') }}

        {{ Form::text('setting_name',null,['placeholder'=>Lang::get('laracms::strings.setting_name')]) }}
        {{ Form::text('setting_value',null,['placeholder'=>Lang::get('laracms::strings.setting_value')]) }}
        {{ Form::submit(Lang::get('strings.save_settings'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
        <hr/>
        @foreach($settings as $setting)
        {{ Form::open(array('url'=>'backend/savesettings', 'class'=>'form-edituser')) }}
        {{ Form::hidden('id', $setting->id) }}

        {{ Form::text('setting_name',$setting->setting_name,['placeholder'=>Lang::get('laracms::strings.setting_name')]) }}
        {{ Form::text('setting_value',$setting->setting_value,['placeholder'=>Lang::get('laracms::strings.setting_value')]) }}
        {{ Form::submit(Lang::get('strings.save_settings'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}

        @endforeach;

    </div>
</div>
