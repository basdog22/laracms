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

                if(View::exists($v.'/extends/'.$this->area.'/sidebarmenu')){
                    $this->layout->sidebarmenu .= View::make($v.'/extends/'.$this->area.'/sidebarmenu');
                }
                if(View::exists($v.'/extends/'.$this->area.'/widgets')){
                    $this->layout->widgets .= View::make($v.'/extends/'.$this->area.'/widgets');
                }
                if(View::exists($v.'/extends/'.$this->area.'/tools')){

                    $this->layout->navtools .= View::make($v.'/extends/'.$this->area.'/tools');

                }
                //check if empty
                $this->layout->sidebarmenu = ($this->layout->sidebarmenu)?$this->layout->sidebarmenu:'';
                $this->layout->widgets = ($this->layout->widgets)?$this->layout->widgets:'';
                $this->layout->navtools = ($this->layout->navtools)?$this->layout->navtools:'';

                $this->layout->sidebar = View::make('backend/sidebar')->with('sidebarmenu',$this->layout->sidebarmenu);
                $this->layout->navbar = View::make('backend/navbar')->with('navtools',$this->layout->navtools);


            }else{

            }

        }
	}

}
