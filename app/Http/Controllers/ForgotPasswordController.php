<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    //
    public function showForgetPasswordForm()
    {
       return view('auth.forgot-password');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
           // 'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) { 
       return view('auth.reset-password', ['token' => $token]);
    }

    public function postEmailPassword(Request $req) { 
        $req->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $req->email)->first();
        if($user == null){
            return back()->with('status', 'User with this email does not exist');
        }
        else{
            // $user = User::where('email', $req->email)
            // ->update(['password' => Hash::make($request->password)]);
            //password_confirmation
            return redirect(route('resetpassword')); //view('auth.reset-password');

        }
    }

    
    public function Post_Reset_Password(Request $req) { 

        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($req->password != $req->password_confirmation){
            return back()->with('status', 'Password does not match');
        }
        $user = User::where('email', $req->email)->first();
       // dd($user);
        if($user == null){
            return back()->with('status', $req->email.' does not exist in our database');
        }
        else{
             $user = User::where('email', $req->email)->update(['password' => Hash::make($req->password)]);
            //
            return redirect(route('login'));

        }
    }
    public function Reset_Password() { 

        return view('auth.reset-password');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }

}
