<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovieRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$new = false;

		if (!$this->movie)
		{
			$new = true;
		}

		return [
			'english_title'  => 'required',
			'georgian_title' => 'required',
			'slug'           => ['required', $new ? Rule::unique('movies', 'slug') : ''],
		];
	}
}
