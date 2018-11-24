<?php

/**
 * JSON Api
 */
$router->group(['prefix' => 'api'], function ($router) {

    /**
     * Users & Profiles
     */
    $router->group(['prefix' => 'user', 'middleware' => 'jwt.auth'], function ($router) {
        $router->get('', function (\Illuminate\Http\Request $request) {
            $user = $request->auth;
            return $user;

        });
    });


    $router->group(['prefix' => 'auth'], function ($router) {
        $router->post('login', 'AuthController@authenticate');
    });

    $router->group(
        ['middleware' => 'jwt.auth'],
        function() use ($router) {
            $router->get('users', function() {
                $users = \App\User::all();
                return response()->json($users);
            });
        }
    );

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