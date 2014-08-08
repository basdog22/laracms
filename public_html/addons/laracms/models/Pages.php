<?php

class Pages extends Lara
{

    protected $table='pages';

    static function page($slug){
        $page = Pages::where('slug','=',$slug)->first();
        return $page;
    }



}