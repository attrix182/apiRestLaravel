<?php

/** @var \Laravel\Lumen\Routing\Router $router */



$router->get('/', function () use ($router) {
    return 'ABM LUMEN';
    
});



$router->get('/items', 'ItemController@listAll');

$router->post('/items', 'ItemController@createItem');

$router->post('/items/{id}', 'ItemController@updateItem');

$router->delete('/items/{id}', 'ItemController@deleteItem');
 ?>

