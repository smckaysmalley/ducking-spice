<?php

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('account.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('account.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(null == Input::get('type')) return [0,'You must select a type'];
		
		
		try {
			$account = new Account();
			$account->user_id = Auth::user()->id;
			$account->type = Input::get('type');
			$account->site = Input::get('site');
			$account->username = Input::get('username');
			$account->password = Input::get('password');
			$account->save();
			return [1,'Successfully added ' . Input::get('site')];
		}catch(Exception $e) {
			return [0,'ERROR: ' . $e->getMessage() . ' at line '. $e->getLine()];
		}
		
	}


	/**
	 * Display the specified resource.
	 * 
	 * @return Response
	 */
	public function show()
	{
		try {
	    	$accounts = Account::where('user_id','=',Auth::user()->id)->get();
	    	return [1, 'Accounts loading successfully... building list now...' ,$accounts];
		}catch(Exception $e) {
			return [0,'ERROR: ' .  $e->getMessage . ' at line ' . $e->getLine];
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		try {
			$account = Account::where('account_id','=',Input::get('account_id'));
			$account->delete();
			return [1,''];
		}catch(Exception $e) {
			return [0,'ERROR: ' . $e->getMessage() . ' at line ' . $e->getLine()];
		}
	}


}
