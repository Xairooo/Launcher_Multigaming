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

// Route::any('{path?}', function () {

//     View::addExtension('html', 'php');
//     return View::make('index');

//  })->where("path", "^((?!api).)*$");


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/
  $router->group([
    'prefix' => 'api'
  ], function ($router) {
    $router->get('/', function() {
        return "API OK";
     });


     $router->get('/user', function() {
        return ["name" => "Henri", "age" => 34, "email" => "root@root.com"];
     });
  });

 