<?php
// Třída Key je Laravel model, který reprezentuje klíč s místností a majitelem
namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
 protected $fillable = ['room_id', 'employee_id'];
 public function room()
 {
  return $this->belongsTo('App\Room');
 }
 public function owner()
 {
  return $this->belongsTo('App\Employee', 'employee_id');
 }
}
