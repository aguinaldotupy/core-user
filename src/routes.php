<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api/people')->namespace('Tupy\Contacts\Controllers')->group(function () {
    Route::GET('/search', 'PeopleController@search')->name('api.people.search');
    Route::POST('/', 'PeopleController@store')->name('api.people.store');
    Route::PUT('/{people}', 'PeopleController@update')->name('api.people.update');
    Route::DELETE('/{people}', 'PeopleController@destroy')->name('api.people.destroy');
});

Route::prefix('api/contacts')->namespace('Tupy\Contacts\Controllers')->group(function () {
    Route::GET('/types', 'Contacts\PeoplesController@types')->name('api.contact.type');
    Route::DELETE('/{contact}', 'Contacts\PeoplesController@destroyContact')->name('api.contact.destroy');
});
