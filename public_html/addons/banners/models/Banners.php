<?php

class Banners extends Eloquent{

    protected $table='banners';

    static function getForSelect(){
        $banners = Banners::all();
        $sel = array();
        foreach($banners as $banner){
            $sel[$banner->id] = $banner->title;
        }
        return $sel;
    }

}