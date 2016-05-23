<?php 
namespace App\Http\Requests\Admin\About;

use App\Http\Requests\Request;

class Update extends Request 
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
			'title' 	=> 'required|min:6',
			'url' 		=> 'required|min:6',
			'content' 	=> 'required|min:20',
			'image'    	=> 'max:200',
		];
	}

}
