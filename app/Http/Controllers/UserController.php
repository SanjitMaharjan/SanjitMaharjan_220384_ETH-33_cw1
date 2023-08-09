<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'phone_number' => "required|min:10|max:10",
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|min:7|max:255',
            'password_confirmation' => 'required|same:password',

        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['is_admin'] = false;
        $user = User::create($attributes);
        auth()->login($user);
        session()->flash('success', 'Your accounted has been created');
        return redirect('/');
    }


    public function loginUser()
    {
        $attributes = request()->validate([
            'phone_number' => 'required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'phone_number' => 'Your provided credentials could not be verified.'
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

    public function addAdminUserPage()
    {
        $users = User::where("is_admin", true)->get();
        foreach ($users as $user) {
            $user->isCurrent = $user->id === Auth::user()->id;
        }
        return view("admin_user", compact('users'));
    }

    public function addAdminUser()
    {
        $attributes = request()->validate([
            'name' => "required|max:255",
            'phone_number' => "required|min:10|max:10",
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|min:7|max:255',
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['is_admin'] = true;
        $user = User::create($attributes);
        session()->flash('success', 'Admin has been created');
        return redirect('/admin/users');
    }

    public function removeAdminUser(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect("/admin/users");
    }
}
