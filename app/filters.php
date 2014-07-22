<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	$addonsNotInstalled = $addonsInstalled = array();
	$addons = Addons::all();
	foreach($addons as $addon){
		if($addon->installed==1){
			$addonsInstalled[] = $addon->addon_name;
            if(file_exists(__DIR__."/../".Config::get('cms.public_dir')."/addons/{$addon->addon_name}/routes.php")){
			    require __DIR__."/../".Config::get('cms.public_dir')."/addons/{$addon->addon_name}/routes.php";
            }
		}else{
			$addonsNotInstalled[] = $addon->addon_name;
		}

	}
	Config::set("cms.addons.data",$addons);
	Config::set("cms.addons.installed",$addonsInstalled);
	Config::set("cms.addons.not_installed",$addonsNotInstalled);


});


App::after(function($request, $response)
{
	//

});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
