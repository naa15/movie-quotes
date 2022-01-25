<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function create()
	{
		return view('admin.login');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if (Auth::attempt($attributes))
		{
			return redirect(route('index'));
		}

		throw ValidationException::withMessages([
			'email' => 'Your provided credentials could not be varified.',
		]);
	}

	public function destroy()
	{
		Auth::logout();
		return redirect(route('index'));
	}
}
