<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';

	public function showMainpage()
	{
        if (Auth::check()){
            $this->layout->sidebar = View::make('backend/sidebar');
            $this->layout->navbar = View::make('backend/navbar');
            $this->layout->content = View::make('backend/backend');
        }else{
            return Redirect::to('users/login');
        }

	}

}
