<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'username' => 'required',
                'password' => 'required'
            ]);

            $credentials = $request->only('username', 'password');


            if (Auth::attempt($credentials)) {

                return redirect('admin/apero')->with(['message' => 'success']);

            } else {
                return back()
                    ->withInput($request->only('username'))
                    ->with(['message' => 'ce ne sont pas les bons !!!']);
            }
        }
        return view('auth.login');
    }

    public function Logout()
    {

        Auth::logout();
        return Redirect('/')->with(['message' => 'succes logout']);

    }
}
