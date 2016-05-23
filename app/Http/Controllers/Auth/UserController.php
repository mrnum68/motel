<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\Login 	as LoginRequest;

use Auth;

use App\User    as UserModel;
use Mail;

class UserController extends Controller 
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            return redirect()->intended();
        }else
        {
            return redirect()->back()
                    ->withInput()
                    ->with('danger-login',trans('system.alert.login-failed'));
        }
    }

    public function password($code = NULL)
    {
        if(is_null($code))
        {
            return view('auth.password');
        }

        $user = UserModel::where('code', $code)->first();
        $this->testNull($user);

        return view('auth.change-password', compact('user'));
    }

    public function password_post(Request $input)
    {

        $this->validate($input, ['username' => 'required']);

        $user = UserModel::where('username', $input->username)
                            ->orWhere('email', $input->username)
                            ->first();
        
        if(is_null($user))
        {
            return redirect()->back()->with('message-password', trans('system.alert.user-not-found'));
        }

        $user->fill(['code' => $this->createCode()]);

        $email = Mail::send('emails.auth.password', compact('user'), function($message) use($user)
        {
            $message->to($user->email, $user->name)->subject('Khôi phục mật khẩu');
        });
        
        $user->save();

        return redirect()->back()
                ->with('message-password', trans('system.alert.password-was-sended'));

    }

    public function password_change(Request $input, $username)
    {
        $this->validate($input, ['password' => 'required|min:5', 'password_confirm' => 'required|same:password']);
        
        $user = UserModel::where('username', $username)->first();
        
        $this->testNull($user);

        $user->update(['code' => NULL, 'password' => $input->password]);

        return redirect()->route('auth.login')->with('danger-login', trans('system.alert.update-success'));
    }

    public function logout()
    {
        Auth::logout();
        session()->clear();
        return redirect()->route('auth.login');
    }

}
