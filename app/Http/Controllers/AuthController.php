<?php

namespace App\Http\Controllers;

use App\Http\Request\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Request\ForgotPasswordRequest;
use App\Http\Request\RegisterRequest;
use App\Http\Request\ResetPasswordRequest;
use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Show specified view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginView()
    {
        return view('auth.login');
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            throw new \Exception('Wrong email or password.');
        } else {
            return response()->json(['success' => true, 'message' => "Login successful"]);
        }
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        if(isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

       $user = User::create($data);
       $user->assignRole('USER');

        return response()->json(['success' => true, 'message' => 'register successful']);
    }

    public function forgotPasswordView()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $data = $request->validated();

        if(!User::whereEmail($data['email'])->exists()){
            throw new \Exception('Please Enter Correct Email.');
        } else {
            $token = md5(uniqid(rand(), true));
            DB::table('password_resets')->insert([
                'email' => $data['email'],
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $user = User::whereEmail($data['email'])->first();
            $url = url('/').'/reset-password/'.$data['email'].'/'.$token;
            $data['link'] = $url;
            $data['name'] = $user->name;
            Mail::to($data['email'])->send(new ResetPassword($data));

            return response()->json(['success' => true, 'message' => 'Mail has been sent successfully. Please check your mail']);
        }
    }

    public function resetPasswordView(Request $request, $email, $token)
    {
        if(DB::table('password_resets')->whereToken($token)->exists()){
            return view('auth.reset-password', [
                'email' => $email,
                'token' => $token
            ]);
        } else {
            throw new \Exception('The Link is expired.');
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $data = $request->validated();

        $email = $data['email'];
        if(isset($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereEmail($email)->update([
            'password' => $data['password']
        ]);

        DB::table('password_resets')->whereEmail($email)->delete();

        return response()->json(['success' => true, 'message' => 'Password updated successfully']);
    }

    /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
