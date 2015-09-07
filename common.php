<?php

require __DIR__.'/vendor/autoload.php';

use Zend\Diactoros\ServerRequestFactory;

date_default_timezone_set('UTC');

$request = ServerRequestFactory::fromGlobals();
