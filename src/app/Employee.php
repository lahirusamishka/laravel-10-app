<?php
// Třída Employee je Laravel model, který reprezentuje zaměstnance a jeho atributy (+ vztahy k dalším modelům)
namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
 protected $fillable = ['first_name', 'last_name', 'salary', 'job', 'room_id'];

 public function getFullName()
 {
  return ucwords($this->first_name . " " . $this->last_name);
 }
 public function room()
 {
  return $this->belongsTo('App\Room', 'room_id');
 }
 public function roomName()
 {
  return $this->room->name;
 }
 public function keys()
 {
  return $this->hasMany('App\Key')->with("room");
 }
 public function roomObjects()
 {
  return $this->keys->pluck('room');
 }
 public function telephone()
 {
  return $this->room ? $this->room->telephone : "";
 }
}
