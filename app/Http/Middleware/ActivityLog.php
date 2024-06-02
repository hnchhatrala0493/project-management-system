<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog as ModelsActivityLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLog {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure( \Illuminate\Http\Request ): ( \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse )  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */

    public function handle( Request $request, Closure $next ) {
        ModelsActivityLog::create( [
            'method_name'=>$request->method(),
            'url'=> $request->url(),
            'route'=> $request->route()->getName(),
            'member_id'=> Auth::user()->id,
        ] );
        return $next( $request );
    }
}