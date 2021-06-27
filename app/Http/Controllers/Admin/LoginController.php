<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Carbon\Carbon;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('admin.auth.login');

    }

    public function doLogin(LoginRequest $request)
    {

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->route('get.admin.login')
                ->with(['error' => trans('login.account_unavailable')]);
        } else {
            if($admin->status == '1'){

                $rememberMe = $request->has('rememberMe') ? true : false;

                if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberMe)) {
                    $admin->update([
                        'last_login_at' => Carbon::now()->toDateTimeString(),
                        'last_login_ip' => $request->getClientIp()
                    ]);
                    return redirect()->route('admin.dashboard');

                } else {
                    return redirect()->route('get.admin.login')->with(['error' => trans('login.login_failed')]);
                }
            }else{
                return redirect()->route('get.admin.login')
                    ->with(['error' => trans('login.account_disabled')]);
            }

        }

    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }


}
