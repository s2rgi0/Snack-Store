<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckRole
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

        $id = $request->user()->id;
        $role = DB::table('role_users')->select('role_id')->where('user_id', $id )->get();

         if( $role[0]->role_id == 2 ){

                return redirect('/home');

            }else{

                return $next($request);

            }

        
    }
}
