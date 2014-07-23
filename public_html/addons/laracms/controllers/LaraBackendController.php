<?php

class LaraBackendController extends BaseController {

    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


    public function menus(){
        $menus = Menus::all();
        $this->layout->content = View::make('laracms/views/menus')->with('menus',$menus);
    }

    public function newmenu(){
        if (Request::ajax()){
            return View::make('laracms/views/menus/new');
        }else{
            $this->layout->content = View::make('laracms/views/menus/new');
        }
    }

    public function newmenuitem(){
        $menus = Menus::all();
        $sel = array();
        foreach($menus as $menu){
            $sel[$menu->id] = $menu->menu_title;
        }
        if (Request::ajax()){
            return View::make('laracms/views/menus/newmenuitem')->with('menus',$sel);
        }else{
            $this->layout->content = View::make('laracms/views/menus/newmenuitem')->with('menus',$sel);
        }
    }

    public function addmenu(){
        $menu = new Menus;
        $menu->menu_name = Input::get('menu_name');
        $menu->menu_title = Input::get('menu_title');
        $menu->save();
        return Redirect::to('backend/menus')->withMessage(Lang::get('messages.menu_created'));
    }


    public function delmenu($menuid){
        $menu = Menus::find($menuid);
        $menu->delete();
        return Redirect::to('backend/menus')->withMessage(Lang::get('messages.menu_deleted'));
    }


    public function menuitems($menuid){
        $menu = Menus::find($menuid);
        $menuitems = Menuitems::where('menuid','=',$menuid);
        $this->layout->content = View::make('laracms/views/menus/menuitems')->with('menuitems',$menuitems)->with('menu',$menu);
    }

}
