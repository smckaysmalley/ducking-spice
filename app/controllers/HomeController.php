<?php

class HomeController extends BaseController {

	public function index()
	{
		if(!Auth::check()) return Redirect::route('session.create');
	    else return View::make('index');
	}

}
