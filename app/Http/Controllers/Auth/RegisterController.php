<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\UserRegistered;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('auth.register');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $fields = $this->validate($request, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255'
    ]);

    $password = Str::random(8);
    $fields['password'] = Hash::make($password);
    Log::info("User Created", ["user" => $fields, "password" => $password]);

    $user = User::create(
      [
        'name' => $fields['name'],
        'email' => $fields['email'],
        'password' => $fields['password'],
      ]
    );

    Mail::to($user)->send(new UserRegistered($user, $password));

    return redirect(RouteServiceProvider::HOME)->with("message", "User created successfully");
  }
}
