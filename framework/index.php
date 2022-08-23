<?php

// includes init php
require_once __DIR__.'/init.php';

// takes parameters from URL identified by 'name' 
$name = $request->query->get('name', 'World');
//dd($name);
// sprintf replaces %s with variable $name
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES, 'UTF-8')));

// Sends HTTP headers and content.
$response->send();