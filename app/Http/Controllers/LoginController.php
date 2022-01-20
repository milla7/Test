<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\LogoutPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use LogTrait;
    public function login( LoginPostRequest $request ){
    	$user = User::where( "email" , $request->email )->first();
    	if ( !Hash::check( $request->password , $user->password ) ) {
            return response()->json([
	        	"success" => false,
                "errors" => [
                    "password" => [ "the password is incorrect" ]
                ]
           	]);
        }
        $token = $user->createToken( Str::random( 10 ) )->plainTextToken;
        $this->saveLog([
            "action" => 'login',
            "status" => true,
            "data" => 'logged user with email: ' . $request->email,
            "id_user" => $user->id
        ]);
        return response()->json([
            "success" => true,
    		"data" => [
    			"id" => $user->id,
    			"email" => $user->email,
    			"access_token" => $token,
                "token_type" => "Bearer"
    		]
        ]);
    }

    public function logout( LogoutPostRequest $request ){
        $user = User::find( $request->id );
        $user->tokens()->delete();
        $this->saveLog([
            "action" => 'logout',
            "status" => true,
            "data" => 'logged out user with email: ' . $user->email,
            "id_user" => $user->id
        ]);
        return response()->json([
            "success" => true,
            "data" => "the user has logged out."
        ]);
    }
}
