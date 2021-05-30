<?php
//auth
$router->group(['prefix'=>'auth'], function () use ($router) {
    $router->post('login',['as'=>'auth.login','uses'=>'AuthController@login']);
    $router->post('logout',['as'=>'auth.logout','uses'=>'AuthController@logout']);
    $router->post('refresh',['as'=>'auth.refresh','uses'=>'AuthController@refresh']);
    $router->post('me',['as'=>'auth.me','uses'=>'AuthController@me']);
});
//user
$router->post('user',['as'=>'user.store','uses'=>'UserController@store']);
//goal
$router->get('goal',['as'=>'goal.list','uses'=>'GoalController@index']);
$router->post('goal',['as'=>'goal.store','uses'=>'GoalController@store']);
//movimient
$router->get('movimient',['as'=>'movimient.list','uses'=>'MovimientController@index']);
$router->post('movimient',['as'=>'movimient.store','uses'=>'MovimientController@store']);


