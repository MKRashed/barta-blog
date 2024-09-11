<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }


    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request['email'])->first();

        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'error' => 'Email or Password wrong!'
            ], 401);
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {

            $request->session()->regenerate();

            return redirect()->intended('admin');
        }
    }
}
