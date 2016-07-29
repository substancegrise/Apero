<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {

            $this->validate($request, [
                'username' => 'required',
                'password' => 'required'
            ]);
            // récupère un tableau associatif email password
            $credentials = $request->only('username', 'password');

            // injection dans la méthode (Auth) pour verification de la présence en base de données

            //dd(Auth::attempt($credentials));

            if(Auth::attempt($credentials))
            {
                //ici on passe avec succès l'authentification laravel (middleware authenticate) donc visualisation de nos pages
                return redirect('admin/apero')->with(['message'=>'success']);
            }else{
                return back()
                    ->withInput($request->only('username'))
                    ->with(['message'=> 'ce ne sont pas les bons !!!']);
            }
        }
        return view('auth.login');
    }

    public function Logout() {

        Auth::logout();
        return Redirect('/')->with(['message'=>'succes logout']);

    }
}
