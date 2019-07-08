<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials = array_add($credentials, 'status', 'on');
        return $credentials;
    }

   protected function sendFailedLoginResponse(Request $request)
    {
        $message = "Unautherized Access , wrong password or username."; //trans('auth.failed');
        $checkuser = User::where(['status'=> 'off','email'=> $request->email])->first();

        if($checkuser != null)
        {
            //  dd($checkuser);
             $message = "Please Contact us to obtain our Blessing.";
        }

        throw ValidationException::withMessages([$this->username() =>[ $message ]]);
        
    }

}
