<?php

class AddonsController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';

    function manage(){

        $addons = Config::get('cms.addons.data');

        $this->layout->content = View::make('backend/addons')->with('addons',$addons);
    }

    function uninstall($addonid){
        if($addonid>1){
            $addon = Addons::find($addonid);
            $addon->installed = 0;
            $addon->save();
            return Redirect::to('addons/manage')->withMessage($this->notifyView(Lang::get('messages.addon_uninstalled')));
        }else{
            return Redirect::to('addons/manage')->withMessage($this->notifyView(Lang::get('messages.no_access'),'error'));
        }

    }

    function install($addonid){
        if($addonid>1){
            $addon = Addons::find($addonid);
            $addon->installed = 1;
            $addon->save();
            return Redirect::to('addons/manage')->withMessage($this->notifyView(Lang::get('messages.addon_installed')));
        }else{
            return Redirect::to('addons/manage')->withMessage($this->notifyView(Lang::get('messages.no_access'),'error'));
        }

    }

    function newaddon(){
        if (Request::ajax()){
            return View::make('backend/newaddon');
        }else{
            $this->layout->content = View::make('backend/newaddon');
        }

    }
}