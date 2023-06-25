<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function auth(AuthRequest $request){
        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais informadas estão incorretas.'],
            ]);
        }
     
        //  $user->createToken($request->device_name)->plainTextToken;
        //  return response()->json(['token'=>$user]);
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' =>$user
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(['success'=>true]);
    }

    public function me(){
        $user = auth()->user();
        return response()->json($user);
    }
}
