<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserController extends Controller
{
    // Show register/create form
    public function create(){
        return view('users.register');
    }

    // Create new user
    public function store(Request $request){
        $formFelids = $request->validate(
            [
                'name' => ['required','min:3'],
                'email' => ['required','email',Rule::unique('users','email')],
                'password' => ['required','confirmed','min:6']
            ]
        );

        // hash password
        $formFelids['password'] = bcrypt($formFelids['password']);

        // Create user
        $user = User::create($formFelids);

        // Login
        auth()->login($user);

        return redirect('/')->with('message','User created and logged in');

        
    }

    // Show login form
    public function login(){
        return view('users.login');
    }

    // Authenticate user
    public function authenticate(Request $request){
        $formFelids = $request->validate(
            [
                'email' => ['required','email'],
                'password' => 'required'
            ]
        );
        if(auth()->attempt($formFelids)){
            $request->session()->regenerate();
            return  redirect('/')->with('message','You are now logged in');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }

    // Logout user
    public function logout(Request $request){
        auth()->logout();

        // recommended for security reasons
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out!');
    }
}
