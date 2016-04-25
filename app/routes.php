<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/user/all', 'Abees\Controller\UserController:getAllUserAction');

$app->post('/user/get', 'Abees\Controller\UserController:getUserByNumberIdAction');

$app->post('/user/create', 'Abees\Controller\UserController:createAction');

$app->post('/log/save', 'Abees\Controller\LogController:saveLogAction');

$app->post('/log/getalllog', 'Abees\Controller\LogController:getAllLogAction');

$app->post('/log/getalllognumberid', 'Abees\Controller\LogController:getAllLogByNumberIdAction');
