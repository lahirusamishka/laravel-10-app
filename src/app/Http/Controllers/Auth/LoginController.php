<?php
// Controller, který se stará o autentifikaci uživatelů a přesměrování na home screen (pomocí Inertia)
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Inertia\Inertia;

class LoginController extends Controller
{
 /*
 |--------------------------------------------------------------------------
 | Login Controller
 |--------------------------------------------------------------------------
 |
 | This controller handles authenticating users for the application and
 | redirecting them to your home screen. The controller uses a trait
 | to conveniently provide its functionality to your applications.
 |
  */

 use AuthenticatesUsers;
 protected $redirectTo = "/";
 public function showLoginForm()
 {
  return Inertia::render('Auth/Login');
 }
}
