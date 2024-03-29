<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\registerRequest;
use App\Models\User;
use Auth;
use Str;
use DB;
use illuminate\Support\Carbon;
use Mail;
use Hash;

class LoginController extends Controller
{
    public function showLogin(){
        if(Auth::check()){
            return redirect('index');
        }else{
        return view('guest.login');
        }
    }

    public function login(LoginRequest $request){
        $credentials =[
            'email' => $request->email,
            'password' => $request->password,
            'status' =>1,
        ];
        if (Auth::attempt($credentials)) {
            if(Auth::id()){
                $userlevel=Auth()->user()->level;
                if($userlevel==1){
                    return view('guest.index');
                }
                else if($userlevel==2){
                    return view('admin.modules.index');
                }
                else{
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->back()->with('error','Email hoặc Password không chính xác');
        }
    }
    public function showRegister(){
        if(Auth::check()){
            return redirect()->back();
        }
        return view('guest.register');
    }

    public function register(registerRequest $request){
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('showLogin');
    }

    public function showForgotPassword(){
        return view('guest.forgotPassword');
    }
    public function forgotPassword(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
        ]);

        $token=Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()
        ]);
        Mail::send('emails.forgetPassword',['token'=>$token],function ($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
        });
        return redirect()->to(route('forget.password'))->with("success", "We have send an email to reset your password");
    }
    public function resetPassword($token){
        $jsonString=DB::table('password_reset_tokens')->select('email')->first();
        $email = $jsonString->email; 
        return view('guest.newPassword',compact('token','email'));
    }

    public function resetPasswordPost(Request $request){
        $jsonString=DB::table('password_reset_tokens')->select('email')->first();
        $email = $jsonString->email; 
        $request->validate([
            "password"=>"required|string|confirmed",
            "password_confirmation"=>"required"
        ]);

        $updatePass=DB::table('password_reset_tokens')->where([
            "token"=>$request->token,
        ])->first();

        if(!$updatePass){
            DB::table('password_reset_tokens')->where("email",$email)->delete();
            return redirect()->to(route('forget.password'))->with('error','Invalid');
        }

        User::where("email",$email)
        ->update(["password" => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where("email",$email)->delete();

        return redirect()->to(route('forget.password'))->with("success","password successfully changes");
    }
}
