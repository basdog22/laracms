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
    protected $area = 'common';

    public function getLogin(){
        $this->layout->content = View::make('backend/login');
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::to('users/login')->with('message', 'Your are now logged out!');
    }
    public function postSignin() {
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('pass')),true)) {
            return Redirect::intended('/backend/dashboard');
        } else {
            return Redirect::to('users/login')
                ->with('message', Lang::get('messages.wrong_pass'))
                ->withInput();
        }
    }

    public function userBackendLayout(){
        $this->area = 'backend';
        $this->layout = 'layouts.backend.devoops';
        $this->setupLayout();
    }

    public function manage(){
        $users = User::paginate(20);

        $this->userBackendLayout();

        $this->layout->content = View::make('backend/users')->with('users',$users);
    }

    public function newuser(){
        $this->userBackendLayout();
        if (Request::ajax()){
            return View::make('backend/newuser');
        }else{
            $this->layout->content = View::make('backend/newuser');
        }
    }

    public function edituser($userid){
        $user = User::find($userid);
        $this->userBackendLayout();
        if (Request::ajax()){
            return View::make('backend/edituser')->with('user',$user);
        }else{
            $this->layout->content = View::make('backend/edituser')->with('user',$user);
        }
    }

    public function saveuser(){
        $user = User::find(Input::get('userid'));
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        if(Input::get('password')){
            $user->password = Hash::make(Input::get('password'));
        }
        $user->save();
        return Redirect::to('users/manage/')->withMessage($this->notifyView(Lang::get('messages.user_saved')));

    }

    public function profile($userid=null){
        $nocontact = false;
        if(!$userid){
            $userid = Auth::user()->id;
            $nocontact = true;
        }
        $user = User::find($userid);
        $this->userBackendLayout();
        if (Request::ajax()){
            return View::make('backend/profile')->with('user',$user)->with('nocontact',$nocontact);
        }else{
            $this->layout->content = View::make('backend/profile')->with('user',$user)->with('nocontact',$nocontact);
        }
    }

    public function adduser(){
        $user = new User;
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return Redirect::to('users/manage/')->withMessage($this->notifyView(Lang::get('messages.user_created')));
    }

}
