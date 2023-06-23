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

// books table routes
$router->get('/books',['uses' => 'BooksController@getBooks']);                          
$router->post('/books',['uses' => 'BooksController@add']);                         
$router->get('/books/{id}',['uses' => 'BooksController@show']);                     
$router->put('books/{id}',['uses' => 'BooksController@update']);          
$router->delete('/books/{id}',['uses' => 'BooksController@delete']);          



