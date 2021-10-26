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

use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware'=>['cors']], function() use($router){
$router->get('/login/{user}/{pass}','AuthController@login');
});

$router->group(['middleware'=>['auth','cors']], function() use($router){

    $router->get('/usuarios', 'UserController@index');
    $router->get('/usuarios/{user}', 'UserController@get');
    $router->post('/usuarios', 'UserController@create');
    $router->put('/usuarios/{user}', 'UserController@update');
    $router->delete('/usuarios/{user}', 'UserController@destroy');

    //Rutas Topics
    $router->get('/topicos', 'TopicController@index');
    $router->get('/topicos/{id}', 'TopicController@get');
    $router->post('/topicos', 'TopicController@create');
    $router->put('/topicos/{id}', 'TopicController@update');
    $router->delete('/topicos/{id}', 'TopicController@destroy');

    //Rutas Post
    $router->get('/posts', 'PostController@index');
    $router->get('/posts/{id_topic}', 'PostController@get');
    $router->post('/posts', 'PostController@create');
    $router->put('/posts/{id}', 'PostController@update');
    $router->delete('/posts/{id}', 'PostController@destroy');
}
);

// $router->get('/test', ['middleware' => ['auth'], function (Request $request) use ($router) {
//     $user = $request->user();
//     return $user->user;
// }]);