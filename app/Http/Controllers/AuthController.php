<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }


    public function login_check(Request $request)
    {

        //validating login form inputs

        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
        ]);

        //checking user credentials

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended('/welcome');
        } else {
            return back()->with('fail', 'Incorrect Username password !!!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }





    public function change_password($id)
    {
        $key = User::find($id);
        return view('change_password', compact('key'));
    }




    public function change_password_check(Request $request, $id)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:4',
            'new_password_again' => 'required|same:new_password',
        ]);

        $password = User::find($id);

        if (!Hash::check($validated['current_password'], $password->password)) {
            return back()->with('success', 'Your password is not matched');
        } else {
            $password->update([
                'password' => Hash::make($validated['new_password'])
            ]);

            return redirect('/details')->with('success', 'Your password has been changed');
        }
    }






    public function register()
    {
        return view('registration');
    }


    public function registration_check(Request $request)
    {
        // validating registration form inputs 

        $validated = $request->validate([
            'user_name' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:20',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);

        // Hashing password

        $validated['password'] = Hash::make($validated['password']);

        //record details in database table
        $user = User::create($validated);
        
        //sending mail for verification purpose 

        // event(new Registered($validated));
        $user->sendEmailVerificationNotification();

        //sending mail for newly registered user
        Mail::to($validated['email'])->send(new WelcomeMail());

        return redirect('/register')->with('success', 'Successfully registered...');
    }


    public function welcome()
    {
        return view('welcome');
    }


}
