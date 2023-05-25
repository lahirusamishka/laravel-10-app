<?php
// Controller, který se stará o CRUD operace pro místnosti, včetně autorizace a validace
namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class RoomsController extends Controller
{

 public function __construct()
 {
  $this->middleware('auth');
 }
 public function index()
 {
	$this->authorize("show", Room::class);
  $rooms = Room::latest()->get();
  $roomsData = [];
  foreach ($rooms as $room) {
   array_push($roomsData, ["id" => $room->id, "number" => $room->number, "telephone" => $room->telephone, "name" => $room->name]);
  }
  return Inertia::render('Rooms/Index', ["rooms" => $roomsData]);
 }

 public function create()
 {
	$this->authorize("edit", Room::class);
  return Inertia::render('Rooms/Create');
 }

 public function store(Request $request)
 {
	$this->authorize("edit", Room::class);
  Room::create(request()->validate([
   "name" => ["required", "min:3", "max:255"],
   "number" => ["integer", "required", "regex:/^[0-9]*$/", "unique:rooms"],
   "telephone" => ["regex:/^\+?[0-9]?[\s?0-9]{3,}$/", "unique:rooms", "nullable"],
  ]));
  return Redirect::route('rooms.index')->with('success', 'Room created.');
 }

 public function show(Room $room)
 {
	$this->authorize("show", Room::class);
  $roomData = ["id" => $room->id, "number" => $room->number, "telephone" => $room->telephone, "name" => $room->name, "salary" => $room->avgSalary(), "employees" => $room->employees(), "keys" => $room->employeeObjects()];
  return Inertia::render('Rooms/Show', ["room" => $roomData]);
 }

 public function edit(Room $room)
 {
	$this->authorize("edit", Room::class);
  return Inertia::render('Rooms/Edit', ["room" => $room]);
 }

 public function update(Request $request, Room $room)
 {
	$this->authorize("edit", Room::class);
  $room->update(request()->validate([
   "name" => ["required", "min:3"],
   "number" => ["integer", "required", "regex:/^[0-9]*$/", Rule::unique('rooms')->ignore($room->id)],
   "telephone" => ["regex:/^\+?[0-9\s?]{3,}$/", "nullable", Rule::unique('rooms')->ignore($room->id)],
  ]));
  return Redirect::back()->with('success', 'Room updated.');
 }

 public function destroy(Room $room)
 {
	$this->authorize("edit", Room::class);
  $room->delete();
  return Redirect::route('rooms.index')->with('success', 'Room removed.');
 }
}
