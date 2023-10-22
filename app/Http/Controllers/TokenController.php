<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = Token::where('user_id', '=', Auth::user()->id)->where('revoked', '=', 0)->first();
        
        return view('token.index', compact('token'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // $user = User::find(Auth::user()->id);
        
        $token = Auth::user()->createToken('auth_token')->accessToken;

        $user = User::findOrFail(Auth::user()->id);
        $user->access_token = $token;
        $user->save();

        return redirect()->back()->with('message', 'Access token generated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $oldToken = Token::where('user_id', '=', Auth::user()->id)->where('revoked', '=', 0)->first();

        if(!empty($oldToken)) {
            $oldToken->revoke();
        }
        
        $token = Auth::user()->createToken('auth_token')->accessToken;

        $user = User::findOrFail(Auth::user()->id);
        $user->access_token = $token;
        $user->save();

        return redirect()->back()->with('message', 'Access token regenerated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
