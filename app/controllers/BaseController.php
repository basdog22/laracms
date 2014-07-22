<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
        $addons = Config::get('cms.addons.installed');

        foreach($addons as $k=>$v){
            if($this->area=='backend'){
                $this->layout->sidebarmenu .= View::make($v.'/extends/'.$this->area.'/sidebarmenu');
            }else{

            }

        }
	}

}
