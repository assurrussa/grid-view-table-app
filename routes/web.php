<?php
/** @var \Illuminate\Routing\Router $router */

$router->group(['prefix' => '', 'as' => 'post.',], function ($router) {
    /** @var \Illuminate\Routing\Router $router */
    $router->get('', 'PostController@index')->name('index');
    $router->get('page2', 'PostController@index2')->name('index2');
    $router->get('post/create', 'PostController@create')->name('create');
    $router->get('post/custom', 'PostController@custom')->name('custom');
    $router->get('post/{id}', 'PostController@show')->name('show');
    $router->get('post/{id}/edit', 'PostController@edit')->name('edit');
    $router->post('post', 'PostController@store')->name('store');
    $router->put('post/{id}', 'PostController@update')->name('update');
    $router->put('post/{id}/restore', 'PostController@restore')->name('restore');
    $router->delete('post/{id}', 'PostController@destroy')->name('destroy');
});
$router->get('city/search', 'CityController@search')->name('city.search');

Auth::routes();

$router->get('/home', 'HomeController@index')->name('home');
