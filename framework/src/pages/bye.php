<?php
//dd(__DIR__,__DIR__.'../../init.php');
require_once __DIR__.'/../../init.php';

$response->setContent('Goodbye!');
$response->send();