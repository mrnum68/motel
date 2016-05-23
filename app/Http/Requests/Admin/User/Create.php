<?php 
namespace App\Http\Requests\Admin\User;

use App\Http\Requests\Request;

class Create extends Request 
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
		return 
		[
			'username' 	=> 'required|min:6|unique|users',
			'email' 	=> 'required|min:6|unique|users',
			'password' 	=> 'required|min:5',
			'password_confirm' 	=> 'required|same:password',
		];
	}

}
