<?php

	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	$api->group(['namespace' => 'App\Api\V1\Controllers', 'middleware' => ['api.auth']], function ($api) {
		$api->get('protected', function () {
			return "It's protected and working!";
		});
		$api->get('technologies', 'TechnologyController@index');
		$api->get('technologies/{id}/productlines', 'ProductLineController@index');
	});

	// example of free route
	$api->get('free', function() {
		return "It's free and working!";
	});

});
