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

$router->get('/login/{user}/{pass}','AuthController@login');

$router->group(['middleware'=>['auth']], function() use($router){

    $router->get('/usuarios', 'UserController@index');
    $router->get('/usuarios/{user}', 'UserController@get');
    $router->post('/usuarios', 'UserController@create');
    $router->put('/usuarios/{user}', 'UserController@update');
    $router->delete('/usuarios/{user}', 'UserController@destroy');

    //$router->get('/topic', 'UserController@index');
}
);