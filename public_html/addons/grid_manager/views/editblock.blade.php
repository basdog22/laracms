<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/dosaveblock', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('grid_manager::strings.saveblock') }}</h2>
        {{ Form::hidden('blockid',$block->id) }}
        @if(isset($contentblock['params']))
        @foreach($contentblock['params'] as $param)
        {{ Form::label($param['label']) }}
        @if($param['type']=='select')
        {{ Form::$param['type']($param['name'],$param['options']) }}
        @else
        {{ Form::$param['type']($param['name']) }}
        @endif
        @endforeach
        @endif
        {{ Form::label(Lang::get('grid_manager::strings.blocks')) }}
        {{ Form::select('view_path',$contentblock['views_path']) }}
        {{ Form::select('event_to_fire',$contentblock['events_to_fire']) }}
        {{ Form::submit(Lang::get('grid_manager::strings.saveblock'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

