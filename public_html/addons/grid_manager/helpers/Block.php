<?php

class Block {



    static  function show($position){
        $route = Route::getCurrentRoute()->getActionName();
        //get the location for this route
        $grid = Grids::where('route','=',$route)->first();
        if(!$grid->id){
            $grid = Grids::find(1);
        }
        $result = '';
        foreach($grid->blocks()->where('block_position','=',$position)->get() as $block){
            $data = Event::fire($block->event_to_fire);
            $result .= View::make($block->view_path);
        }
        return $result;
    }

    static function reserve($position,$title){
        $positions = Config::get('cms.themepositions');
        $positions[Config::get('cms.currentrow')][$position] = $title;
        Config::set('cms.themepositions',$positions);
    }

    static function getReservedPositions(){
        $positions = Config::get('cms.themepositions');
        return $positions;
    }

    static function openRow($rowname){
        Config::set('cms.currentrow',$rowname);
    }

    static function getContentBlocks(){
        Event::fire('content.blocks.collect');
        return Config::get('cms.contentblocks');
    }
}