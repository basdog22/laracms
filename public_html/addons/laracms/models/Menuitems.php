<?php

class Menuitems extends Eloquent
{

    protected $table='menuitems';

    public function menu(){
        return $this->belongsTo('Menus');
    }

}