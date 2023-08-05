<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function registerUser()
    {
        $attributes = request()->validate([
            'name' => "required|max:255",
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|min:7|max:255',

        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $user = User::create($attributes);
        auth()->login($user);
        session()->flash('success', 'Your accounted has been created');
        return redirect('/');
    }


    public function loginUser()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verifies.'
            ]);
        }
        session()->regenerate();

        return redirect('/')->with('success', 'welcome back!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'You have been logout');
    }
}
