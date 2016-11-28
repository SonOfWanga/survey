<?php

//Route::get('/home', 'HomeController@index');
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
Route::post('organization/update/{organization}', 'OrganizationsController@update');
Route::resource('organization', 'OrganizationsController');

Route::post('category/update/{category}', 'CategoryController@update');
Route::resource('category', 'CategoryController');

Route::resource('surveyor', 'SurveyorController');

Route::resource('questionnaire', 'QuestionnaireController');

Route::auth();

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/', 'OrganizationsController@index');

Route::resource('categorysurveyors', 'CategorySurveyorsController');

Route::get('categorysurveyors/{surveyor}/delete/{cat_id}', 'CategorySurveyorsController@destroy');

Route::group(['prefix' => 'api/v1'], function () {
        Route::get('/api_login', 'SurveyorApiController@login');
        Route::get('/form', 'SurveyorApiController@form');
 });


