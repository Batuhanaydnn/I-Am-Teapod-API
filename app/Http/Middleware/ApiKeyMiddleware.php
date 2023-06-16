<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiKeyMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        
        $secret_key = $request->input('secret_key');
        $db = DB::table('api_keys')->where(['secret_key' => $secret_key]);

        $is_login = session('is_login');
        $user_type = session('user_type');

        if($db->exists()){
            if($is_login == 1){
                if($user_type == 1){ // user_type 1 yönetici manasındadır
                    return $next($request);
                }
                else{
                    return response()->json(['status' => 401, 'description' => 'I am Teapod and you are a not admin, go way here']);
                }
            }
            else{
                return response()->json(['status' => 401, 'description' => 'I am Teapod and you are a not admin, go way here']);
            }

        }
        else{
            // session()->forget('is_login');
            return response()->json(['status' => 401, 'description' => 'I am Teapod and you are a not admin, go way here']);
        }
        return $next($request);

    }
}
