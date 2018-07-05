<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/caroussels', 'CarousselController');
Route::resource('/admin/categories', 'CategorieController');
Route::resource('/admin/clients', 'ClientController');
Route::resource('/admin/services', 'ServiceController');
Route::resource('/admin/projets', 'ProjetController');
Route::resource('/admin/tags', 'TagController');
Route::resource('/admin/testimonials', 'TestimonialController');
Route::resource('/admin/articles', 'ArticleController');
Route::resource('/admin/users', 'UserController');
Route::get('/', 'FrontController@welcome')->name('welcome');
Route::get('/services', 'FrontController@service')->name('services');
Route::get('/blogs', 'FrontController@blog')->name('blog');
Route::get('/blogs{article}', 'FrontController@blogShow')->name('blogShow');
Route::post('/contactMail', 'FrontController@contactMail')->name('contactMail');
Route::post('/newsletterMail', 'NewsletterController@newsletterMail')->name('newsletterMail');

