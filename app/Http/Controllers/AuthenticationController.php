<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;

class AuthenticationController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function authenticate(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // dd("disini");
            $token = $request->session()->regenerate();

            $rtoken = Auth::user()->createToken('auth_token')->accessToken;

            $user = User::findOrFail(Auth::user()->id);
            $user->access_token = $rtoken;
            $user->save();
            // dd($token);
            
            return redirect()->route('home');
        }
 
        return back()->with('LoginError', 'The email or password do not match our records.');
    }

    public function Logout(Request $request)
    {
        $oldToken = Token::where('user_id', '=', Auth::user()->id)->where('revoked', '=', 0)->first();

        if(!empty($oldToken)) {
            $oldToken->revoke();
        }
        
        $user = User::findOrFail(Auth::user()->id);
        $user->access_token = null;
        $user->save();

        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();


        return redirect()->route('login');
    }

    public function createRegister()
    {
        return view('pages.register');
    }

    public function storeRegister(UserRequest $request)
    {
        $validatedData = $request->except(['_token']);
        $validatedData['password'] = Hash::make($request->password);
        // dd($validatedData);
        $user = User::create($validatedData);

        return redirect('login');
    }

    public function home() {
        return view('layouts.blank');
    }
}
