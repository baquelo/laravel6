<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles', function () {
    return view('roles');
});

Route::get('/reports', function () {
    return 'the secrets reports';
})->middleware('can:view_reports');



Route::get('conversations', 'ConversationsController@index');
Route::get('conversations/{conversation}', 'ConversationsController@show')->middleware('can:view,conversation');

Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/contact', 'ContactController@show')->name('contact.show');
Route::post('/contact', 'ContactController@store');

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->middleware('auth');
Route::get('notifications', 'UserNotificationsController@show')->middleware('auth');
