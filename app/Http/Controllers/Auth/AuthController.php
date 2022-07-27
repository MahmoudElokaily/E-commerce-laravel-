<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgetPassword;
use App\Mail\verificationEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function check(LoginRequest $request){
        $credentials = $request->only('email' , 'password');
        if (Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->withErrors('oops , username or password is wrong');
        }
    }

    public function register(){
        return view('Auth.register');
    }

    public function store(RegisterRequest $request){
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $this->sendEmailVerification($user);
        return redirect()->back()->with('success' , 'user are registered');
    }

    public function sendEmailVerification(User $user){
        $data = [
            'name' => $user->name,
            'id' => Crypt::encrypt($user->id),
        ];
        Mail::to($user)->send(new verificationEmail($data));
    }

    public function verificationEmail($id){
        $id = Crypt::decrypt($id);
        $user = User::find($id);
        $user->update([
            'email_verified_at' => Carbon::now()->timestamp,
        ]);
        dd('Success');
   }

   public function forgetPassword(){
        return view('Auth.forget');
   }

   public function sendPasswordMail(Request $request){
        $user = User::where('email' , $request->email)->get()->first();
        if (!$user)
            return redirect()->back()->with('error' , 'the email can not found');
        $this->forgetPasswordEmail($user);
        dd('Please,Check your mail');

   }

   public function forgetPasswordEmail($user){
        $mailDta = [
          'name' => $user->name,
            'id' => Crypt::encrypt($user->id),
        ];
        Mail::to($user)->send(new ForgetPassword($mailDta));
   }

   public function resetPassword($id){
        return view('Auth.resetPassword')->with('id' , $id);
   }

   public function updatePassword(Request $request){
        $id = Crypt::decrypt($request->id);
        $user = User::find($id);
       if (!$user || $request->password1 != $request->password2)
           return redirect()->back()->with('error' , 'password does not match');
       $user->update([
           'password' => Hash::make($request->password1),
       ]);
       dd('Password change Successfully');
   }
}
