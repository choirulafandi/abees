<?php

require_once __DIR__.'/../vendor/autoload.php'; 

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// Instantiate the app
$app = new \Slim\App();
require __DIR__ . '/../app/dependencies.php';
require __DIR__ . '/../app/database.php';
require __DIR__ . '/../app/middleware.php';
require __DIR__ . '/../app/routes.php';

$app->run();