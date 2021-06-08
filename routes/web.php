<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/biodata', 'BiodataController@index');
    $router->post('/biodata', 'BiodataController@store');
    $router->post('/biodata/{id}', 'BiodataController@update');
    $router->get('/biodata/{id}', 'BiodataController@show');
    $router->delete('/biodata/{id}', 'BiodataController@delete');
    
    $router->get('/api_covid', 'ApiController@index');
});