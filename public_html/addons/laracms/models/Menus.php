<?php

class Menus extends Eloquent
{

    protected $table='menus';

    public function menuitems(){
        return $this->hasMany('Menuitems')->orderby('sort','asc');
    }

    static function getForSelect(){
        $menus = Menus::all();
        $sel = array();
        foreach($menus as $menu){
            $sel[$menu->id] = $menu->menu_title;
        }
        return $sel;
    }

}