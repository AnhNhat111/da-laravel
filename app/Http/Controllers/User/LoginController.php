<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('user.pages.login.index');
    }

    public function login(Request $request)
    {
        $data = DB::select('select * from taikhoan'); 
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    if (Auth::guard('user')->attempt([
        'email' => $request->email,
        'password' => $request->password
       
    ], $request->get('remember'))) {
        
         return redirect()->intended(route('user.pages.login',[$data]));
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
