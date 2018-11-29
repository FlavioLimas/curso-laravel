<?php

namespace App\Http\Middleware;

use Closure;

class TestCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $id = $request->has('id', null);
        // $id = $request->query('id', null);
        $id = $request->get('id', null);
        if(is_null($id)) {
            // dd('Não Passou no Middleware');
            return redirect('/');
        }
        return $next($request);
    }
}
