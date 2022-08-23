<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//creating a request from $_GET
$request = Request::createFromGlobals();
$response = new Response();