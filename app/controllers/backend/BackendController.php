<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';

	public function showMainpage()
	{
		$this->layout->content = View::make('backend/backend');
	}

}
