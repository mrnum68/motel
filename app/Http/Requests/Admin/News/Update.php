<?php 
namespace App\Http\Requests\Admin\News;

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
			'title' 	=> 'required',
			'url' 		=> 'required',
			'content' 	=> 'required',
			'news_category_id' 	=> 'required',
		];
	}

}
