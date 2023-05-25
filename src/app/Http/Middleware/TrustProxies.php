<?php
// Middleware, který nastavuje proxies a headers, který mají být použity pro detekci proxies (nevyužívám)
namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
 protected $proxies = "*";

/**
 * The headers that should be used to detect proxies.
 *
 * @var string
 */
 protected $headers = Request::HEADER_X_FORWARDED_AWS_ELB;
}
