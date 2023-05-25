<?php
// Controller, který se stará o CRUD operace pro zaměstnance, včetně validace a autorizace
namespace App\Http\Controllers;

use App\Employee;
use App\Key;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EmployeesController extends Controller
{
 public function __construct()
 {
  $this->middleware('auth');
 }
 public function index()
 {
	$this->authorize("show", Employee::class);
  $employees = Employee::All();
  $employeesData = [];
  foreach ($employees as $employee) {
   array_push($employeesData, ["id" => $employee->id, "fullName" => $employee->getFullName(), "room" => $employee->roomName(), "telephone" => $employee->telephone(), "job" => $employee->job]);
  }
  return Inertia::render('Employees/Index', ["employees" => $employeesData]);
 }

 public function create()
 {
	$this->authorize("edit", Employee::class);
  $rooms = Room::all()->toArray();
  return Inertia::render('Employees/Create', ["rooms" => $rooms]);
 }

 public function store(Request $request)
 {
	$this->authorize("edit", Employee::class);
  $employee = new Employee($this->validateArticle());
  $employee->save();
  foreach (request("keys") as $key) {
   Key::create([
    "room_id" => (int) $key,
    "employee_id" => $employee->id,
   ]);
  }
  return Redirect::route('employees.index')->with('success', 'Employee created.');
 }

 public function show(Employee $employee)
 {
	$this->authorize("show", Employee::class);
  $employeeData = ["id" => $employee->id, "fullName" => $employee->getFullName(), "room" => $employee->roomName(), "telephone" => $employee->telephone(), "job" => $employee->job, "salary" => $employee->salary, "keyRooms" => $employee->roomObjects(), "room_id" => $employee->room_id];
  return Inertia::render('Employees/Show', ["employee" => $employeeData]);
 }

 public function edit(Employee $employee)
 {
	$this->authorize("edit", Employee::class);
  $rooms = Room::all()->toArray();
  return Inertia::render('Employees/Edit', ["employee" => $employee, "rooms" => $rooms, "roomObjects" => $employee->roomObjects()]);
 }

 public function update(Request $request, Employee $employee)
 {
  $this->authorize("edit", Employee::class);
  $employee->update($this->validateArticle());
  $employee->keys()->delete();
  foreach (request("keys") as $key) {
   Key::create([
    'room_id' => (int) $key,
    'employee_id' => $employee->id,
   ]);

  }

  return Redirect::back()->with('success', 'Employee updated.');
 }

 public function destroy(Employee $employee)
 {
  $this->authorize("edit", Employee::class);
  $employee->delete();
  return Redirect::route('employees.index')->with('success', 'Employee removed.');
 }

 public function validateArticle()
 {
  return request()->validate([
   "first_name" => ["required", "min:3", "regex:/[a-zA-Z]+/"],
   "last_name" => ["required", "min:3", "regex:/[a-zA-Z]+/"],
   "room_id" => ["required", "integer", "exists:rooms,id"],
   "job" => ["required", "regex:/[\sa-zA-Z]+/"],
   "salary" => ["required", "integer", "regex:/^[0-9]*$/"],
  ]);
 }
}
