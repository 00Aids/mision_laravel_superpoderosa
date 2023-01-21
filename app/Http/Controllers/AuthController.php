<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => 3600
        ]);


    }

    public function me(){
         $user = User::where('id', Auth::user()->id)->with(['roles', 'roles.permissions'])->first();
        return response()->json($user);
    }
 

    public function logout(){
        Auth::logout();
        return response()->json(['message'=> 'Successfully logged out']);
    }

    public function register(Request $request){
 
        try{
       
            $request->validate([
                'name'=> 'required|string',
                'email' => 'required|email',
                'password' => 'required|string',
                'admin_code' => 'string'  
            ]);
  
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> bcrypt($request->password) //aca lo que hago es incriptar la contraseña siempre se debe hacer
            ]);

            if ($request->admin_code && $request->admin_code =='programaresgod'){
                $user->assignRole('admin');
            }else{
                $user->assignRole('manager');
            }
  
             
  
  
        }catch(\Exception $e){
            return response()->json([
                'message' => $e ->getMessage()
            ]);
        }
       
    }




}
