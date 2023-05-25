<?php
// Middleware, který trimuje všechny strink inputy, kromě hesla a potvrzení hesla (bezpečnost a hlídání zbytečných mezer atp.)
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
