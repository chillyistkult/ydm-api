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

		$api->get('technologies', 'ProductFamilyController@index');
		$api->get('technologies/{id}', 'ProductFamilyController@show');
		$api->get('technologies/{id}/productlines', 'ProductLineController@index')->where(['switch' => '^(lines|groups)$']);
		$api->get('technologies/{pfId}/productlines/{plId}', 'ProductLineController@show');
		$api->get('technologies/{pfId}/productlines/{pgId}/filters', 'FilterController@index');
        $api->get('productgroups', 'ProductGroupController@index');
		$api->get('filters', 'FilterController@index');
        $api->post('filters', 'FilterController@store');
        $api->put('filters', 'FilterController@updateAll');
		$api->get('filters/{id}', 'FilterController@show')->where('id', '[0-9]+');
		$api->put('filters/{id}', 'FilterController@update')->where('id', '[0-9]+');
        $api->delete('filters/{id}', 'FilterController@destroy')->where('id', '[0-9]+');
		$api->get('filters/{fId}/properties/{pId}/models', 'ModelController@getByFilterAndProperty');
		$api->get('filters/types', 'FilterTypeController@index');
		$api->get('filters/types/{id}', 'FilterTypeController@show')->where('id', '[0-9]+');
		$api->get('filters/groups', 'FilterGroupController@index');
		$api->get('filters/groups/{id}', 'FilterGroupController@show')->where('id', '[0-9]+');
		$api->get('filters/properties', 'FilterPropertyController@index');
		$api->get('filters/properties/{id}', 'FilterPropertyController@show')->where('id', '[0-9]+');
		$api->put('filters/properties/{id}', 'FilterPropertyController@update')->where('id', '[0-9]+');
		$api->get('filters/properties/{pId}/models/{mId}', 'FilterPropertyController@show');
		$api->get('models', 'ModelController@index');
		$api->get('models/{id}', 'ModelController@show');

	});

	// example of free route
	$api->get('free', function() {
		return "It's free and working!";
	});

});
