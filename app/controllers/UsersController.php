<?php

class UsersController extends BaseController {

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

    protected $layout = 'layouts.common.locked';

    public function getLogin(){
        $this->layout->content = View::make('backend/login');
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'Your are now logged out!');
    }
    public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('pass')),true)) {
            return Redirect::intended('/backend/');
        } else {
            return Redirect::to('users/login')
                ->with('message', Lang::get('messages.wrong_pass'))
                ->withInput();
        }
    }



}
