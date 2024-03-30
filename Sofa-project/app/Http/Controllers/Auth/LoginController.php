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
use Mail;
use Hash;
use App\Models\Product;
use App\Mail\ForgotPasswordMail;

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
                    $products_lastest = Product::orderBy('created_at','DESC')->skip(0)->take(4)->get();
                    return view('guest.index',[
                        'products_lastest' => $products_lastest,
                    ]);
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
            'email'=>'required|email',
        ]);
        $count=User::where('email',$request->email)->count();
        if($count>0){
            $user=User::where('email',$request->email)->first();
            $user->remember_token=Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success','Password reset email have been sent');
        }else{
            return redirect()->back()->with('error','Email not found in system');
        }
    }
    public function resetPassword($token){
        $jsonString=User::select('email')->where('token',$token)->first();
        $email = $jsonString->email; 
        return view('guest.newPassword',compact('token','email'));
    }

    public function resetPasswordPost(Request $request){
        $jsonString=User::select('email')->first();
        $email = $jsonString->email; 
        $request->validate([
            "password"=>"required|string|confirmed",
            "password_confirmation"=>"required"
        ]);

        $updatePass=DB::table('password_reset_tokens')->where([
            "token"=>$request->token,
        ])->first();

        if(!$updatePass){
            return redirect()->to(route('forget.password'))->with('error','Invalid');
        }

        User::where("email",$email)
        ->update(["password" => Hash::make($request->password)]);

        return redirect()->to(route('forget.password'))->with("success","password successfully changes");
    }
}
