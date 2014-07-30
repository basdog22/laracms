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
        $menus = Menus::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        $this->layout->content = View::make('laracms/views/menus/menus')->with('menus',$menus);
    }

    public function newmenu(){
        if (Request::ajax()){
            return View::make('laracms/views/menus/new');
        }else{
            $this->layout->content = View::make('laracms/views/menus/new');
        }
    }

    public function settings(){
        $settings = Settings::whereRaw("section='laracms'")->get();

        $this->layout->content = View::make('laracms/views/settings')->with('settings',$settings);
    }

    public function savesettings(){
        if(Input::get('id')){
            $settings = Settings::find(Input::get('id'));
        }else{
            $settings = new Settings;
        }
        $settings->area = Input::get('area');
        $settings->section = Input::get('section');
        $settings->setting_name = Input::get('setting_name');
        $settings->setting_value = Input::get('setting_value');
        $settings->autoload = Input::get('autoload');
        Event::fire('backend.settings.save', array($settings));
        $settings->save();
        return Redirect::to('backend/settings/')->withMessage($this->notifyView(Lang::get('laracms::messages.settings_saved'),'success'));
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
        return Redirect::to('backend/menus')->withMessage($this->notifyView(Lang::get('laracms::messages.menu_created'),'success'));
    }

    public function addmenuitem(){
        $menu = new Menuitems;
        $menu->menuid = Input::get('menuid');
        $menu->url = Input::get('url');
        $menu->link_text = Input::get('link_text');
        $menu->link_target = Input::get('link_target');
        $menu->link_attr = Input::get('link_attr');
        $menu->link_css = Input::get('link_css');
        $menu->link_class = Input::get('link_class');
        $menu->save();
        return Redirect::to('backend/menuitems/'.Input::get('menuid'))->withMessage($this->notifyView(Lang::get('laracms::messages.menuitem_created'),'success'));
    }

    public function editmenuitem($menuitemid){
        $menuitem = Menuitems::find($menuitemid);
        $menus = Menus::all();
        $sel = array();
        foreach($menus as $menu){
            $sel[$menu->id] = $menu->menu_title;
        }
        if (Request::ajax()){
            return View::make('laracms/views/menus/editmenuitem')->with('menuitem',$menuitem)->with('menus',$sel);
        }else{
            $this->layout->content = View::make('laracms/views/menus/editmenuitem')->with('menuitem',$menuitem)->with('menus',$sel);
        }

    }


    public function delmenu($menuid){
        $menu = Menus::find($menuid);
        $menu->delete();
        return Redirect::to('backend/menus')->withMessage($this->notifyView(Lang::get('messages.menu_deleted')));
    }

    public function editmenu($menuid){
        $menu = Menus::find($menuid);
        if (Request::ajax()){
            return View::make('laracms/views/menus/edit')->with('menu',$menu);
        }else{
            $this->layout->content = View::make('laracms/views/menus/edit')->with('menu',$menu);
        }
    }

    public function savemenu(){
        $menu = Menus::find(Input::get('menuid'));
        $menu->menu_name = Input::get('menu_name');
        $menu->menu_title = Input::get('menu_title');
        $menu->save();
        return Redirect::to('backend/menus')->withMessage($this->notifyView(Lang::get('laracms::messages.menu_saved'),'success'));
    }

    public function savemenuitem(){
        $menu = Menuitems::find(Input::get('menuitemid'));
        $menu->menuid = Input::get('menuid');
        $menu->url = Input::get('url');
        $menu->link_text = Input::get('link_text');
        $menu->link_target = Input::get('link_target');
        $menu->link_attr = Input::get('link_attr');
        $menu->link_css = Input::get('link_css');
        $menu->link_class = Input::get('link_class');
        $menu->save();
        return Redirect::to('backend/menuitems/'.Input::get('menuid'))->withMessage($this->notifyView(Lang::get('laracms::messages.menuitem_saved')));
    }

    public function menuitems($menuid){
        $menu = Menus::find($menuid);
        $menuitems = Menuitems::where('menuid','=',$menuid)->get();
        $this->layout->content = View::make('laracms/views/menus/menuitems')->with('menuitems',$menuitems)->with('menu',$menu);
    }

    public function pages(){
        $pages = Pages::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        $this->layout->content = View::make('laracms/views/pages/pages')->with('pages',$pages);
    }


    public function newpage(){
        $pages = Pages::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        $this->layout->content = View::make('laracms/views/pages/new')->with('pages',$pages);
    }

    public function editpage($pageid){
        $pages = Pages::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        $page = Pages::find($pageid);
        $this->layout->content = View::make('laracms/views/pages/new')->with('pages',$pages)->with('page',$page);
    }

    public function savepage(){
        if(Input::get('pageid')){
            $page = Pages::find(Input::get('pageid'));
        }else{
            $page = new Pages;
        }
        $page->page_slug = Input::get('page_slug');
        $page->title = Input::get('title');
        $page->subtitle = Input::get('subtitle');
        $page->content = Input::get('content');
        $page->status = Input::get('status');
        $page->save();

        if(Input::get('saveclose')){
            return Redirect::to('backend/pages/')->withMessage($this->notifyView(Lang::get('laracms::messages.page_saved')));
        }else{
            return Redirect::to('backend/editpage/'.$page->id)->withMessage($this->notifyView(Lang::get('laracms::messages.page_saved')));
        }
    }

}
