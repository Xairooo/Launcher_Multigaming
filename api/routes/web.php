<?php

/**
 * JSON Api
 */
$router->group(['prefix' => 'api'], function ($router) {

    /**
     * Users & Profiles
     */
    $router->group(['prefix' => 'user'], function ($router) {
        $router->get('/', function () {
            return ["name" => "Charle", "age" => 39, "email" => "root@root.com"];
        });
    });


    $router->group(['prefix' => 'auth'], function ($router) {
        $router->post('login', 'AuthController@authenticate');
    });
    /**
     * Site status
     */
    $router->get('status', function () { /* Return JSON response */
    });
});

/**
 * Serve angularjs boot html
 */
$router->get('{path:.*}', function () {
    return view('index');
});