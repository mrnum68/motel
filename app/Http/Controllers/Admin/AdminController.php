<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login 	as LoginRequest;
use Illuminate\Http\Request;

use Auth;
use App\User    as UserModel;
use App\Models\ImageTop    as ImageTopModel;

class AdminController extends Controller 
{

	public function index()
	{
		return view('backend.admin_index');
	}
	public function login()
	{
		return view('auth.login');
	}
	public function login_post(LoginRequest $input)
    {
        $user = UserModel::where('email', $input->username)
                    	->orWhere('username', $input->username);
        if(!$user->count()) return redirect()->back()->withInput()
                    ->with('danger-login', trans('system.alert.user-not-found'));

        $user = $user->first();
        
        $old = $input->all();
        $old['email']   = $user->email;
        
        $input->replace($old);

        
        if(Auth::attempt($input->only('email', 'password'), $input->has('remember')))
        {            
            return view('backend.admin_index');
        }else
        {
            return redirect()->back()
                    ->withInput()
                    ->with('danger-login',trans('system.alert.login-failed'));
        }
    }

	public function logout()
    {
        Auth::logout();
        session()->clear();
        return redirect()->route('auth.login');
    }

    public function getImageTop(){
        $image = ImageTopModel::all();
        return view('backend.image_top',compact('image'));
    }
	
    public function deleteImg($id){

    }

}
