<?php

class HomeController extends BaseController {

	public function index()
	{
		if(!Auth::check()) return View::make('session.create');
	    else return View::make('index');
	}

}
