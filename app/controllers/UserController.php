<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$password = Input::get('password');
		$pw_confirm = Input::get('confirm_password');
		if($password != $pw_confirm) return View::make('user.create')->with('error','Passwords do not match.');
		
		try {
			$user = new User();
			$user->email = Input::get('email');
			$user->password = Hash::make($password);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->save();
			if (Auth::attempt(array('email' => Input::get('email'), 'password' => $password))) return View::make('index');
			else return View::make('session.create')->with('error','Account created but failed to log in. Please try again...');
		}catch(Exception $e) {
			return View::make('user.create')->with('error','ERROR: ' . $e->getMessage() . ' at line '. $e->getLine());
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function show()
	{
		return View::make('user.show');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
		return View::make('user.edit');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find(Auth::id());
		$user->email = Input::get('email');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->save();
		return View::make('user.show')->with('msg','User account updated successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
