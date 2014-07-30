<?php

class Grids extends Eloquent
{

    protected $table='gridmanager';


    public function blocks(){
       return $this->hasMany('Blocks');
    }
}