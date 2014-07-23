<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function dashboard()
	{

        $this->layout->content = View::make('backend/backend')->with('widgets',$this->layout->widgets);


	}

}
