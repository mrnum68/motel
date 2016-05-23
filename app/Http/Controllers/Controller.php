<?php 
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController 
{

	use DispatchesCommands, ValidatesRequests;

	public final function testNull($object)
    {
    	if(is_null($object)) return abort(404);
    }
    
    public final function destinationUploads($path = NULL)
    {
    	if($path)
    	{
    		return 'uploads/'. date('Y') . '/'. date('m'). '/' .trim($path, '/');
    	}
    	return 'uploads/'. date('Y') . '/'. date('m');
    }

    public final function createCode($string = 'qwe!@#123')
    {
        return str_slug(bcrypt( time(). str_shuffle($string)));
    }
    
}
