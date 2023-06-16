<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// ilk olarak görevi basit bulduğumdan kaynaklı olarak apiyi
// geliştirmek istedim. Bu yüzden size attığım ayrıntılı dökümantasyonu
// takip edebilirsiniz. 

class UsersController extends Controller
{
    public function getUsers(Request $request){
        // Tüm userları görebildiğimiz bir alan 
        $users = DB::table('users')->get();


        return $users;
    }

    public function getUser(Request $request){
        $user_id = $request->input('user_id'); //user_id
        $user = DB::table('users')->where(['id' => $user_id])->get(); // database queey

        if(count($user) != 0){
            return response()->json($user, 200); // 200 OK

        }
        else{
            return response()->json(['status_code' => 404, 'description' => 'User bulunamadı'], 404);
        }
    }
    public function postUser(Request $request){
        // User Variables
        $name_surname = $request->input('name_surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $user_type = $request->input('user_type');
        $add = DB::table('users')->insert([
            'name_surname' => $name_surname,
            'email' => $email,
            'password' => $password,
            'user_type' => $user_type
        ]);

        if($add){
            return response()->json(['status' => 200, 'description' => 'User successfully added']);
        }
        else{
            return response()->json(['status' => 418, 'description' => 'I am Teapod and you did something wrong']);
        }
    }
    public function deleteUser(Request $request){
        $user_id = $request->input('user_id');
        $delete = DB::table('users')->where([$id => $user_id])->delete();

        if($delete){
            return response()->json(['status' => 200, 'description' => 'User succesfully deleted']);

        }
        else{
            return response()->json(['status' => 418, 'description' => 'I am Teapod and You poor mortal can\'t erase me']);

        }

        
    }
    public function putUser(Request $request){
        $user_id = $request->input('user_id');
        $name_surname = $request->input('name_surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $user_type = $request->input('user_type');

        $update = DB::table('users')->where(['id' => $user_id])->update([
            'name_surname' => $name_surname,
            'email' => $email,
            'password' => $password,
            'user_type' => $user_type
        ]);
        if($update){
            $get = DB::table('users')->where(['id' => $user_id])->first();
            return response()->json(['status' => 200, 'description' => 'User succesfully edit', 'user' =>$get], 200);
        }
        else{
            return response()->json(['status' => 418, 'description' => 'I am Teapod and you foolish human can\'t edit me '], 418);
        }
    }

    public function getLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $login = DB::table('users')->where(['email' => $email, 'password' => $password]);
        if($login->exists()){
            $user_types = DB::table('users')->where(['email' => $email, 'password' => $password])->first()->user_type;

            session(['is_login' => 1, 'user_type' => $user_types]);


            return response()->json(['status' => 200, 'description' => 'User successfully login'], 200);
        
        }
        else{
            return response()->json(['status' => 404, 'description' => 'I am Teapod and I am the teapod and go sign up or get lost you poor mortal'], 404);
            
        }
    }
    public function userSelection(Request $request){
        $name = $request->input('name');
        $value = $request->input('value');

        $find = DB::table('users')->where([$name => $value]);

        if($find->exists()){
            return response()->json(['status' => 200, 'description' => 'Users with the desired feature have been brought', 'user' => $find->get()], 200);

        }
        else{
            return response()->json(['status' => 418, 'description' => 'I am Teapod and I am the teapod and I curse you for not finding users forever'], 418);
        }
    }


}

