<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth; 
use App\SetAtribut;

use App\Classes\CommunityBPS;
use DOMDocument;
use Exception;
use Hash;
class AuthController2 extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post(config('services.passport.login_endpoint'), [
                'form_params' => [
                    'grant_type' => 'password',
                    // 'client_id' => config('services.passport.client_id'),
                    // 'client_secret' => config('services.passport.client_secret'),
                    'client_id' => config('services.passport.client_id'),
                    'client_secret' => config('services.passport.client_secret'),
                    'username' => $request->username,
                    'password' => $request->password,
                ]
            ]);
            // return $response->getBody();
             return redirect()->route('home');
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
        
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Logged out successfully', 200);
    }


    //////////////////////////
    // https://medium.com/@martin.riedweg/laravel-5-7-api-authentification-with-laravel-passport-92b909e12528

    public function login2 (Request $request) {
        dd($request);
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
    
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = "Password missmatch";
                return response($response, 422);
            }
    
        } else {
            $response = 'User does not exist';
            return response($response, 422);
        }
    
    }


     /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login3(Request $request)
    {
       
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
       
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
       
        // return ['redirect' => route('home_api')];
        //return View('home', compact('setatributs'));
        $setatribut = new SetAtribut;
        $setatributs = $setatribut->get();

    //     return 
    // // ->view('home', compact('setatributs'))
    // View('home', compact('setatributs'))
    // ->header([
    //     'Content-Type' => 'application/javascript',
    //     'Authorization'   => 'Bearer ' . $tokenResult->accessToken,
    // ]);

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout3(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function getLogin()
    {
        return view('auth.Login_V2.login');
    }

    public function postLogin(Request $request)
    {
        require "classes/communitybps.php";
        // $communitybps = new CommunityBPS('bps7206', 'olimas205');
        $username = substr($request->email, 0, -10);
    
        //  $communitybps = new CommunityBPS($request->input('account')['username'], $request->input('account')['password']);
        $communitybps = new CommunityBPS($username, $request->pass);
        // $communitybps = new CommunityBPS('bps7206', 'olimas205');
       
        if ($communitybps) {
            $users = new User;
            $user = $users->where('email', $request->email)->first();

                if ($user == NULL) {
                    $users->name = $username;
                    $users->email = $request->email;
                    $users->password = Hash::make($request->pass);
                    $users->save();

                    return redirect()->route('home');
                } else {
                    $nama = Auth::user();
                    dd('asda');
                    return redirect()->route('home');
                }
                
            
        } else {
            dd('false');
        }
        


        return redirect()->route('home');
    }


}
