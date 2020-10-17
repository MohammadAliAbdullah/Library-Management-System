<?php

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    Route::get('/register/student', 'Auth\RegisterController@WriterRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/student', 'Auth\LoginController@studentLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/student', 'Auth\RegisterController@createStudent');

    Route::view('/home', 'home')->middleware('auth');
    Route::view('/admin', 'admin')->middleware('auth:admin');
    Route::view('/stuent', 'student')->middleware('auth:student');

    Route::get('posts', 'HomeController@posts')->name('posts');
    Route::post('posts', 'HomeController@postPost')->name('posts.post');
    Route::get('posts/{id}', 'HomeController@show')->name('posts.show');
    Route::get('rat', 'RatController@index');

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(
    [
    'prefix' => 'admin',
    'namespace' => 'admin',
    'middleware' => 'auth:admin',
    ], function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('student', 'StudentsController');
        Route::post('searchstud', 'StudentsController@search');
        Route::get('pdf', 'StudentsController@pdf');
        Route::get('pdf1', 'StudentPDFController@index');
        Route::get('pdf2', 'StudentPDFController@pdf');
        Route::resource('department', 'DepartmentController');
        Route::post('search', 'DepartmentController@search');
        Route::resource('author', 'AuthorController');
        Route::post('searchaut', 'AuthorController@search');
        Route::resource('book', 'BookController');
        //Route::post('search', 'BookController@search');
        Route::resource('issueBook', 'IssueBookController');
        //  Route::post('search', 'IssueBookController@search');
        Route::resource('library', 'LibraryController');
        //  Route::post('search', 'LibraryController@search');
        Route::resource('user', 'ManageUserController');

        Route::get('events', 'EventController@index');
        Route::resource('ajaxproducts', 'ProductAjaxController');
        Route::resource('posts', 'PostController');
    });
    Route::group(
        [
        'prefix' => 'student',
        'namespace' => 'student',
        'middleware' => 'auth:student',
        ], function () {
            Route::get('dashboard', 'DashboardController@index');
        });
