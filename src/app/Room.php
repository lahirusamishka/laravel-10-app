<?php
// Třída Room je Laravel model, který obsahuje metody k získání zaměstnanců, klíčů, průměrné mzdy, a objektů zaměstnanců
namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
 protected $fillable = ['name', 'number', 'telephone'];

 public function employees()
 {
  return Employee::where("room_id", $this->id)->get();
 }
 public function keys()
 {
  return $this->hasMany('App\Key')->with("owner");
 }
 public function avgSalary()
 {
  return $this->employees()->avg("salary");
 }
 public function employeeObjects()
 {
  return $this->keys->pluck("owner");
 }
}
