<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Administration
{

    protected $auth;



    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->guest() || $this->auth->user()->role !="admin"){
            if($request->ajax()){
                return response('Unauthorized', 401);
            }else{
                return redirect('/')->with('error','vous ne pouvez pas editer ce contenu');
            }
        }
        return $next($request);
    }
}
