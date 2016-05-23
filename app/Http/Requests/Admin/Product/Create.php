<?php 
namespace App\Http\Requests\Admin\Product;

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
			'name' 	=> 'required|min:6',
			'url' 	=> 'required|min:6',
			'content' 	=> 'required',
			'category_id' 	=> 'required',
			'price' 	=> 'numeric'
		];
	}

}
