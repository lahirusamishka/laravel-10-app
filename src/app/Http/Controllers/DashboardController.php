<?php
// Controller, který renderuje dashboard index stránku pomocí Inertia knihovny (+ middleware)
namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
 public function __invoke()
 {
  return Inertia::render('Dashboard/Index');
 }
 public function __construct()
 {
  $this->middleware('auth');
 }
}
