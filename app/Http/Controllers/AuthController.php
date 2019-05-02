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
class AuthController extends Controller
{
   
    public function getLogin()
    {
        return \View::make('auth/Login_V2/login');
    }

    public function postLogin(Request $request)
    {
        // dd(\Auth::attempt(['email'=> $request->email, 'password'=> $request->pass]));
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
                    $user_new = new User;
                    $user_new->name = $username;
                    $user_new->email = $request->email;
                    $user_new->password = Hash::make($request->pass);
                    $user_new->save();

                    // auth()->loginUsingId($user->id);
                    
                    if(!\Auth::attempt(['email'=> $request->email, 'password'=> $request->pass])){
                        return redirect()->back();    
                    }

                    return redirect()->route('home');
                } else {
                    if(!\Auth::attempt(['email'=> $request->email, 'password'=> $request->pass])){
                        return redirect()->back();    
                    }

                    return redirect()->route('home');
                }
                
            
        } else {
            dd('false');
        }
        


        return redirect()->route('home');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }


}
