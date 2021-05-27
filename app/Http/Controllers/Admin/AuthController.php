<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

// use Auth; //use thư viện auth


class AuthController extends Controller
{
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:admin', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->guard('web')->user();
            
            \Session::put('success','You are Login successfully!!');
            return redirect()->route('admin.login');
            
        } else {
            return back()->with('error','your username and password are wrong.');
        }
    




        // $arr = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];
        // if ($request->remember == trans('remember.Remember Me')) {
        //     $remember = true;
        // } else {
        //     $remember = false;
        // }
        // //kiểm tra trường remember có được chọn hay không
        
        // if (Auth::guard('web')->attempt($arr)) {

        //     dd('đăng nhập thành công');
        //     //..code tùy chọn
        //     //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        // } else {

        //     dd('tài khoản và mật khẩu chưa chính xác');
        //     //...code tùy chọn
        //     //đăng nhập thất bại hiển thị đăng nhập thất bại
        // }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // auth()->guard('admin')->logout();
        // \Session::flush();
        \Session::put('success','You are logout successfully');        
        return redirect(route('admin.login'));
    }

}