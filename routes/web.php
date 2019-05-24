<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'Controller@index');
$router->get('/login', 'Controller@getLogin');
$router->post('/login', 'Controller@postLogin');
$router->get('/logout', 'Controller@getLogout');
$router->post('/config', 'Controller@postConfig');
$router->post('/user', 'Controller@postUser');
