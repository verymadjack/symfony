<?php
//  require_once '../vendor/autoload.php';

// front controller which is presented to end user

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/pages/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
try {
    extract($matcher->match($request->getPathInfo()), EXTR_SKIP);   // Routing configuration is now in a different file
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    $response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $exception) {
    $response = new Response('Not Found', 404);
} catch (Exception $exception) {
    $response = new Response('An error occurred', 500);
}

$response->send();