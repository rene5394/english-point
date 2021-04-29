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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/acerca-de-nosotros', 'HomeController@acercadenosotros')->name('about');
Route::get('/contactanos', 'HomeController@contactanos')->name('contact');
Route::get('/cursos', 'HomeController@cursos')->name('courses');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::match(['get', 'post'], '/test-wopmpi', 'WompiController@index');
Route::post('/test-wopmpi2', 'WompiController@index');

Route::get('/auth-wompi', 'WompiController@authWompi');

Route::get('/create-transaction', 'WompiController@testCreateTransaction');

require __DIR__.'/auth.php';
