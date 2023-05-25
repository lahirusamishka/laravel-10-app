<?php
// Controller, který se stará o zobrazení, aktualizaci a smazání uživatelských profilů pro autentifikované uživatele
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ProfileController extends Controller
{
 public function __construct()
 {
  $this->middleware('auth');
 }

 public function show()
 {
  return Inertia::render('Profile/Edit');
 }

 public function update(Request $request)
 {
  $user = Auth::user();
  if ($user->isDemoUser()) {
   return Redirect::back()->with('error', 'You can not edit demo user.');
  }

  if ($user->admin) {
   if (request()->get('admin') === "0") {
    $user->update(["admin" => 0]);
   }
  } else if (request()->get('admin') === "1") {
   return Redirect::back()->with('error', 'You can not edit your role.');
  }

  if (!request()->validate([
   'name' => ['required', 'max:255'],
   'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($user->id)],
   'password' => ['min:8', 'nullable'],
   'admin' => ['required', 'boolean'],
  ])) {
   return;
  }

  $user->update(request()->only('name', 'email'));
  if (request()->get('password')) {
   $user->update(['password' => Hash::make(request()->get('password'))]);
  }
  return Redirect::back()->with('success', 'User updated.');

 }

 public function destroy()
 {
  $user = Auth::user();
  if ($user->isDemoUser()) {
   return Redirect::back()->with('error', 'You can not edit demo user.');
  }
  $user->delete();
  return redirect()->route('logout');
 }

}
