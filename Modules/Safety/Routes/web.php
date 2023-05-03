<?php

use Inertia\Inertia;

Route::middleware('auth')->prefix('safety')->group(function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
    Route::delete('profile', 'ProfileController@destroy')->name('profile.destroy');

    Route::get('/dashboard', function () {
        return Inertia::render('Safety::Dashboard');
    })->name('safety_dashboard');

    Route::resource('roles', RolesController::class);

    Route::resource('permissions', PermissionController::class);
    Route::get('destroy/permissions/{id}', 'PermissionController@destroy')->name('permissions_destroy');

    Route::get('table/permissions', 'PermissionController@getDataPermissions')->name('permissions_table');
});
