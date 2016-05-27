<?php

use App\Models\CommonProductFamily as ProductFamily;
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	$api->group(['middleware' => ['api.auth']], function ($api) {
		$api->get('protected', function () {
			return "It's protected and working!";
		});
		$api->get('technologies', function() {
			return ProductFamily::with(['commonTranslateWordId'])->get()->all();
			//return ProductFamily::with(['commonProductGroupValues.commonProductGroup', 'commonProductGroupValues.commonProductLine', 'commonProductGroupValues.commonProductLineGroup'])->get()->all();
		});

		$api->get('technologies/{id}/productgroups', function() {
			return null;
		});
	});

	// example of free route
	$api->get('free', function() {
		return "It's free and working!";
	});

});
