<?php

Route::group([
    'middleware' => ['web'],
    'namespace' => 'WTG\Auth\Controllers',
    'as' => 'auth::'
], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', 'LoginController@getLogin')->name('login');
        Route::get('password/email', 'Auth\PasswordController@getEmail')->name('password.email');
        Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password.reset');
        Route::get('register', 'RegistrationController@view')->name('register.form');
        Route::get('register/sent', 'RegistrationController@sent')->name('register.sent');

        Route::post('login', 'LoginController@postLogin');
        Route::post('register', 'RegistrationController@register');
        Route::post('password/email', 'Auth\PasswordController@postEmail');
        Route::post('password/reset', 'Auth\PasswordController@postReset');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', 'LogoutController@postLogout')->name('logout');
    });
});