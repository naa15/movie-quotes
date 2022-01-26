<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreSessionRequest;

class SessionController extends Controller
{
	public function create()
	{
		return view('admin.login');
	}

	public function store(StoreSessionRequest $request)
	{
		$attributes = $request->validated();

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
