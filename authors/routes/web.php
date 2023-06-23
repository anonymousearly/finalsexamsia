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

// authors table routes
$router->get('/authors',['uses' => 'AuthorsController@getAuthors']);                          
$router->post('/authors',['uses' => 'AuthorsController@add']);                         
$router->get('/authors/{id}',['uses' => 'AuthorsController@show']);                     
$router->put('authors/{id}',['uses' => 'AuthorsController@update']);          
$router->delete('/authors/{id}',['uses' => 'AuthorsController@delete']);          



