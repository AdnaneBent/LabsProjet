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

Route::resource('/admin/caroussels', 'CarousselController')->middleware('can:admin');
Route::resource('/admin/categories', 'CategorieController')->middleware('can:admin');
Route::resource('/admin/clients', 'ClientController')->middleware('can:admin');
Route::resource('/admin/services', 'ServiceController')->middleware('can:admin');
Route::resource('/admin/projets', 'ProjetController')->middleware('can:admin');
Route::resource('/admin/tags', 'TagController')->middleware('can:admin');
Route::resource('/admin/testimonials', 'TestimonialController')->middleware('can:admin');
Route::resource('/admin/articles', 'ArticleController')->middleware('auth');
Route::resource('/admin/users', 'UserController')->middleware('can:admin');
Route::resource('/admin/commentaires', 'CommentaireController')->middleware('auth');
Route::resource('/admin/validCom', 'ValidCommentaireController')->middleware('can:admin');
Route::resource('/admin/validation', 'ValidArticleController')->middleware('can:admin');
Route::get('/', 'FrontController@welcome')->name('welcome');
Route::get('/services', 'FrontController@service')->name('services');
Route::get('/blogs', 'FrontController@blog')->name('blog');
Route::get('/SearchCat/{categorie}', 'FrontController@ResearchByCat')->name('SearchCat');
Route::get('/SearchTag/{tag}', 'FrontController@ResearchByTag')->name('SearchTag');
Route::get('/Search', 'FrontController@ResearchByTitre')->name('SearchTitre');
Route::get('/blogs/{article}', 'FrontController@blogShow')->name('blogShow');
Route::post('/commentaire/{articles_id}', 'FrontController@commentaire')->name('commentaire');
Route::post('/contactMail', 'FrontController@contactMail')->name('contactMail');
Route::post('/newsletterMail', 'NewsletterController@newsletterMail')->name('newsletterMail');


