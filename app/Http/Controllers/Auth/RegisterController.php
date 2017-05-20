<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }


    public function FormPro()
    {
        return view('auth.register_pro');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $token = str_random(60);
        return User::create([
            'name' => null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => $token,
            'firstname' => null,
            'lastname' => null,
            'avatar' => false,
            'show_phone' => false
        ]);
    }
    /*
     * DEBUT COMPTE PRO
     */

    protected function validator_pro(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|alpha_num|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'description' => 'required|min:2|unique:users',
            'siret' => 'required|min:10|max:14|unique:users',
        ]);
    }

    protected function create_pro(array $data)
    {
        $token = str_random(60);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_token' => $token,
            'firstname' => null,
            'lastname' => null,
            'avatar' => false,
            'pro' => true,
            'role' => 'pro',
            'description' => $data['description'],
            'siret' => $data['siret'],
            'show_phone' => false
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('', __('messages.register_mail'));
    }
    /*
     * FIN COMPTE PRO
     */

    public function register_pro(Request $request)
    {
        $this->validator_pro($request->all())->validate();

        event(new Registered($user = $this->create_pro($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('', __('messages.register_mail'));
    }


}
