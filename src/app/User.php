<?php
// Třída User rozšiřuje třídu Authenticable a obsahuje metodu pro kontrolu, jestli je uživatel demo uživatel
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
 use Notifiable;

 protected $fillable = [
  'name', 'email', 'password', 'admin',
 ];

 protected $hidden = [
  'password', 'remember_token',
 ];

 protected $casts = [
  'email_verified_at' => 'datetime',
 ];

 public function isDemoUser()
 {
  return $this->email === "demo@example.com";
 }
}
