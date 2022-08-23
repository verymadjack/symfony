<?php
require_once '../vendor/autoload.php';

// front controller which is presented to end user

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();


// map that redirects to a correct file depending on URL
$map = [
    '/hello' => '../src/pages/hello.php',
    '/bye'   => '../src/pages/bye.php',
];

$path = $request->getPathInfo();
//dd($path);
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();