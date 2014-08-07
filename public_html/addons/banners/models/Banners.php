<?php

class Banners extends Eloquent
{

    protected $table = 'banners';

    static function getForSelect()
    {
        $banners = Banners::all();
        $sel = array();
        foreach ($banners as $banner) {
            $sel[$banner->id] = $banner->title;
        }
        return $sel;
    }

    static function cachedIn($ids = array())
    {
        $ids = implode(",",$ids);
        $banners = Cache::remember('banners', 60, function () use($ids){
            return Banners::whereRaw("id IN ({$ids})")->get();
        });
        return $banners;

    }

}