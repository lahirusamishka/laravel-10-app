<?php
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\Cors;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/')->name('dashboard')->uses('DashboardController');

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('/login', 'Auth\LoginController@login')->name('login.attempt')->middleware('guest');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');

Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register')->middleware('guest');
Route::post('/register', 'Auth\RegisterController@register')->name('register.attempt')->middleware('guest');


Route::get('/rooms/create', 'RoomsController@create')->name('rooms.create')->middleware(IsAdmin::class);

Route::get('/rooms', 'RoomsController@index')->name('rooms.index');
Route::get('/rooms/{room}', 'RoomsController@show')->name('rooms.show');

Route::delete('/rooms/{room}/delete', 'RoomsController@destroy')->name('rooms.destroy');
Route::get('/rooms/{room}/edit', 'RoomsController@edit')->name('rooms.edit')->middleware(IsAdmin::class);

Route::put('/rooms/{room}', 'RoomsController@update')->name('rooms.update');
Route::post('/rooms', 'RoomsController@store')->name('rooms.store');

Route::get('/employees/create', 'EmployeesController@create')->name('employees.create')->middleware(IsAdmin::class);

Route::get('/employees', 'EmployeesController@index')->name('employees.index');
Route::get('/employees/{employee}', 'EmployeesController@show')->name('employees.show');

Route::delete('/employees/{employee}/delete', 'EmployeesController@destroy')->name('employees.destroy');
Route::get('/employees/{employee}/edit', 'EmployeesController@edit')->name('employees.edit')->middleware(IsAdmin::class);
Route::put('/employees/{employee}', 'EmployeesController@update')->name('employees.update');
Route::post('/employees', 'EmployeesController@store')->name('employees.store');
Route::get('500', function () {
    echo $fail;
});

Route::get('/profile', 'ProfileController@show')->name('profile');
Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

