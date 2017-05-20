<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    private $auth;
    public function __construct(Guard $auth)
    {
        $this->middleware('auth');
        $this->auth = $auth;
    }

    public function getEdit(){
        // $user = Auth::user();  ça c'est la version si on passe Guard $auth en params
        $user = $this->auth->user();
        return view('users.edit', compact('user'));
    }


    public function update(Request $request){
        $user = $this->auth->user();
        $this->validate($request,[
           'avatar' => "image",
            "siret" => "min:10|max:14"
        ]);

        $data = $request->all();
        $data['show_phone'] = ($request['show_phone'])?:0;
        $user->update($data);

       // $user->update($request->only('firstname', 'lastname', 'avatar', 'description'));
        return redirect()->back()->with('success',  __('messages.edit_profil') );
    }
}
