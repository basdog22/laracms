<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function dashboard()
	{

        $this->layout->content = View::make('backend/backend')->with('widgets',$this->layout->widgets);


	}

    public function help(){
        if (Request::ajax()){
            return View::make('backend/help');
        }else{
            $this->layout->content = View::make('backend/help');
        }
    }

}
