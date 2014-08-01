<?php

class Pages extends Eloquent
{

    protected $table='pages';

    static function page($slug){
        $page = Pages::where('page_slug','=',$slug)->first();
        return $page;
    }

}