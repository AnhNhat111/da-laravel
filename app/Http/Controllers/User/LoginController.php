<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $redirectTo = '/user';

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    public function showLoginForm()
    {
        return view('user.pages.login.Dangnhap');
    }

    public function index()
    {
        return view('user.pages.login.home');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    if (Auth::guard('user')->attempt([
        'email' => $request->email,
        'password' => $request->password

    ], $request->get('remember'))) {

         return redirect()->intended(route('user.login'));
    }
         return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->route('user.login');
    }
}
