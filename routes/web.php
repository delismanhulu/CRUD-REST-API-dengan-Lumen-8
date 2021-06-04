<?php
// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/biodata', 'BiodataController@index');
    $router->get('/biodata/{id}', 'BiodataController@show');
    $router->post('/biodata', 'BiodataController@store');
    $router->post('/biodata/{id}', 'BiodataController@update');
    $router->delete('/biodata/{id}', 'BiodataController@delete');
    
});