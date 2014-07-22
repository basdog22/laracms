<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function getDashboard()
	{
        if (Auth::check()){
            $this->layout->content = View::make('backend/backend')->with('widgets',$this->layout->widgets);
        }else{
            return Redirect::to('users/login');
        }

	}

}
