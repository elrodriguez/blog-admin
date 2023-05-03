<?php

use Inertia\Inertia;

Route::middleware('auth')->prefix('blog-admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Blog::Dashboard');
    })->name('blog_dashboard');

    Route::resource('category', CategoriesController::class);
});


Route::prefix('blog')->group(function () {
    Route::get('/index', 'BlogController@index')->name('blog_index');
    Route::get('/articles/category/{id}', 'CategoriesController@getArticlesByCategory')->name('blog_articles_by_category');
});
