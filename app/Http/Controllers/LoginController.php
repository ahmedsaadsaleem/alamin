<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        // dd((bool) $request->post('remember'));
        
        if ($request->method() !== 'POST') {
            return redirect()->route('home');
        }
        
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials['active'] = 1;

        if ($request->has('remember')) {
            $remember = (bool) $request->post('remember');
        } else {
            $remember = (bool) $request->post('remember');
        }

        if (Auth::attempt($credentials, $remember)) {
            session()->regenerate();
            // dd(session()->all());
            return redirect()->intended();
        }

        return redirect()->back()->withErrors([
            'username' => 'the provided credentals don`t mathes our records'
        ])->onlyInput('username');
    }

    public function authenticateExistingUser(User $user): RedirectResponse
    {
        if (Auth::login($user)) {
            session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors([
            'username' => 'the provided credentals don`t mathes our records'
        ])->onlyInput('username');
    }
}
