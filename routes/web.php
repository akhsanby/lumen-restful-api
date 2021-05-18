<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('api/fruit', 'FruitController@index');
$router->post('api/fruit', 'FruitController@store');
$router->get('api/fruit/{id}', 'FruitController@show');
$router->put('api/fruit/{id}', 'FruitController@update');
$router->delete('api/fruit/{id}', 'FruitController@destroy');