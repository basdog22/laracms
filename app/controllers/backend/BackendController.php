<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function dashboard()
	{
        Event::fire('backend.dashboard.before_load');
        $this->layout->content = View::make('backend/backend')->with('widgets',$this->layout->widgets);
        Event::fire('backend.dashboard.after_load');
	}

    public function help(){
        if (Request::ajax()){
            return View::make('backend/help');
        }else{
            $this->layout->content = View::make('backend/help');
        }
    }

}
