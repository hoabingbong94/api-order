<?php

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

$router->get('/', function () {
    return "HELLO";
});

$router->group(['prefix' => 'api/v1'], function ($router) {
//    get list user
    $router->get('/users', 'UsersController@index');
    $router->post('/create', 'UsersController@create');

//    get slider
    $router->group(['prefix' => '/slider'], function ($router) {
        $router->get('/', 'SliderController@index');
        $router->post('/create', 'SliderController@create');
        $router->post('/update/{id}', 'SliderController@update');
    });
//API get page home
    $router->group(['prefix' => 'home'], function ($router) {
        $router->get('/', 'HomeController@index');
        $router->get('/detail/{id}', 'HomeController@detail');
        $router->get('/tab/{type}', 'HomeController@tab');
    });

    $router->group(['prefix' => 'order'], function ($router) {
        $router->get('/', 'OrderController@index');
        $router->post('/update', 'OrderController@update');
    });
    $router->group(['prefix' => 'orderdetail'], function ($router) {
//        $router->get('/', 'OrderController@index');
        $router->get('/', 'OrderDetailController@orderdetail');
        $router->post('/update', 'OrderDetailController@update');
    });

    $router->group(['prefix' => 'table'], function ($router) {
//        $router->get('/', 'OrderController@index');
        $router->get('/', 'TableDinnerController@index');
        $router->post('/update', 'TableDinnerController@update');
    });
});