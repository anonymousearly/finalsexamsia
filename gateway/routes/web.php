<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['middleware' => 'client.credentials'],function() use ($router) {

     // books table routes
    $router->get('/books',['uses' => 'BooksController@getBooks']);                          
    $router->post('/books',['uses' => 'BooksController@add']);                         
    $router->get('/books/{id}',['uses' => 'BooksController@show']);                     
    $router->put('books/{id}',['uses' => 'BooksController@update']);          
    $router->delete('/books/{id}',['uses' => 'BooksController@delete']);    
    
    // authors table routes
    $router->get('/authors',['uses' => 'AuthorsController@getAuthors']);                          
    $router->post('/authors',['uses' => 'AuthorsController@add']);                         
    $router->get('/authors/{id}',['uses' => 'AuthorsController@show']);                     
    $router->put('authors/{id}',['uses' => 'AuthorsController@update']);          
    $router->delete('/authors/{id}',['uses' => 'AuthorsController@delete']);





});


         

