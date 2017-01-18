<?php

//Route::get('/home', 'HomeController@index');
/*
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get('/', 'OrganizationsController@index');
Route::post('organization/update/{organization}', 'OrganizationsController@update');
Route::resource('organization', 'OrganizationsController');

Route::get('category/{category}/publish', 'CategoryController@publish');
Route::post('category/update/{category}', 'CategoryController@update');
Route::get('category/delete/{category}', 'CategoryController@destroy');
Route::resource('category', 'CategoryController');

Route::resource('surveyor', 'SurveyorController');

Route::post('questionnaire/update/{questionnaire}', 'QuestionnaireController@update');
Route::get('questionnaire/delete/{questionnaire}/category/{category}', 'QuestionnaireController@destroy');
Route::resource('questionnaire', 'QuestionnaireController');

Route::resource('categorysurveyors', 'CategorySurveyorsController');
Route::get('categorysurveyors/{surveyor}/delete/{cat_id}', 'CategorySurveyorsController@destroy');

Route::get('dashboard', 'DashboardController@index');

Route::resource('accountusers', 'AccountUsersController');

Route::auth();

Route::get('/logout', 'Auth\AuthController@logout');

Route::group(['prefix' => 'api/v2/'], function () {
    Route::get('getForm/{code}', 'Api\QuestionniareController@getForm');
});

?>
