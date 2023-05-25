<?php
// Service provider třída, která registruje a konfiguruje různé services (Inertia a Glide)
namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use League\Glide\Server;

class AppServiceProvider extends ServiceProvider
{

 public function boot()
 {
	if (env('APP_ENV') === 'production') {
        URL::forceScheme('https');
    }
  Date::use (CarbonImmutable::class);
 }

 public function register()
 {
  $this->registerInertia();
  $this->registerGlide();
 }

 public function registerInertia()
 {
  Inertia::version(function () {
   return md5_file(public_path('mix-manifest.json'));
  });

  Inertia::share([
   'auth' => function () {
    return [
     'user' => Auth::user() ? [
      'id' => Auth::user()->id,
      'name' => Auth::user()->name,
      'email' => Auth::user()->email,
      'admin' => Auth::user()->admin,
     ] : null,
    ];
   },
   'flash' => function () {
    return [
     'success' => Session::get('success'),
     'error' => Session::get('error'),
    ];
   },
   'errors' => function () {
    return Session::get('errors')
    ? Session::get('errors')->getBag('default')->getMessages()
    : (object) [];
   },
  ]);
 }

 protected function registerGlide()
 {
  $this->app->bind(Server::class, function ($app) {
   return Server::create([
    'source' => Storage::getDriver(),
    'cache' => Storage::getDriver(),
    'cache_folder' => '.glide-cache',
    'base_url' => 'img',
   ]);
  });
 }

}
