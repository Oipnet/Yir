<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use ReflectionMethod;

class Safe_data
{

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
       $controller_name = explode('@', $request->route()->getAction()['uses'])[0];

        $controller = app($controller_name);
        $reflectionMethod = new ReflectionMethod($controller_name, 'getResource');
        $resource = $reflectionMethod->invokeArgs($controller, $request->route()->parameters());

        if($resource->user_id != $this->auth->user()->id){
            if($request->ajax()){
                return response('Unauthorized', 401);
            }else{
                return redirect('/')->with('error','vous ne pouvez pas editer ce contenu');
            }
        }
        $request->route()->setParameter($request->route()->parameterNames()[0], $resource);

        return $next($request);
    }
}
