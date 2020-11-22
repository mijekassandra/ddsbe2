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

// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
   });

$router->get('/users', 'UserController@index');//get all users record
$router->post('/users', 'UserController@add');//add users
$router->get('/users/{id}', 'UserController@show');//get users by id
$router->put('/users/{id}', 'UserController@update');//update user record
$router->patch('/users/{id}', 'UserController@update');//get
$router->delete('/users/{id}', 'UserController@delete');//delete record


