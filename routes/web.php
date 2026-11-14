<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});
//Admin Routes
Route::get('admin', 'AdminController@admin')->name('admin');

Route::group(['middleware' => ['auth','admin']], function () {
    Route::resource('admins','AdminController');
    Route::get('admin-dashboard', 'AdminController@index')->name('admin-dashboard');
    //Admin Job Routes
    Route::resource('adjobs','Admin\JobController');
    Route::get('/job-list','Admin\JobController@index')->name('job-list');
    Route::get('jobs-view/{$id}', 'Admin\JobController@show')->name('jobs-view');
    //Admin Company Routes
    Route::resource('adcompanies','Admin\CompanyController');
    Route::get('/company-list','Admin\CompanyController@index')->name('company-list');
    Route::get('company-view/{$id}', 'Admin\CompanyController@show')->name('company-view');
  

});

  //Extra Pages
  Route::get('/form', function () {
    return view('admin.pages.forms.advanced');
})->name('form');
Route::get('/modals', function () {
    return view('admin.pages.UI.modals');
})->name('modals');

//About Page Route
Route::get('about', function(){ return view('about.index'); })->name('about');

//User Routes
Route::resource('users','UserController');
Route::get('create-profile', 'UserController@create')->name('create-profile')->middleware('profile');
Route::get('create-edu-info', 'UserController@createEduInfo')->name('create-edu-info')->middleware('profile');
Route::get('create-experience', 'UserController@createExperience')->name('create-experience')->middleware('profile');
// Route::get('edit-profile', 'UserController@edit')->name('editProfile');
Route::post('store-profile', 'UserController@store')->name('store-profile');
Route::post('store-edu-info', 'UserController@storeEduInfo')->name('store-edu-info');
Route::post('store-experience', 'UserController@storeExperience')->name('store-experience');


//Jobs Routes
Route::resource('jobs','JobsController');
Route::get('job', 'JobsController@index')->name('job');
Route::get('archives', 'JobsController@archive')->name('archives');
Route::get('closed', 'JobsController@closed')->name('closed');
Route::get('declined', 'JobsController@declined')->name('declined');
Route::get('myjobs', 'JobsController@myjobs')->name('myjobs');
Route::get('create-job', 'JobsController@create')->name('create-job');
Route::post('store-job', 'JobsController@store')->name('store-job');
//Company Routes
Route::resource('companies','CompanyController');
Route::get('company', 'CompanyController@index')->name('company');
Route::get('company-archives', 'CompanyController@archive')->name('company-archives');
Route::get('company-declined', 'CompanyController@declined')->name('company-declined');
Route::get('mycompanies', 'CompanyController@mycompanies')->name('mycompanies');
Route::get('create-company', 'CompanyController@create')->name('create-company');
Route::post('store-company', 'CompanyController@store')->name('store-company');

//Pages Routes
Route::get('/error', function () {
    return view('pages.unauthorized');
})->name('unauth'); 

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
