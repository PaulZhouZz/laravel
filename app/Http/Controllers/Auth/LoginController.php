<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * 重定向用户信息到 GitHub 认证页面
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToProvider() {
        return Socialite::driver('github')->redirect();
    }

    /**
     * 获取来自 github 返回的用户信息
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
    }


}
