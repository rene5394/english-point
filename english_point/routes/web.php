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

// Website pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/acerca-de-nosotros', 'HomeController@acercadenosotros')->name('about');
Route::get('/contactanos', 'HomeController@contactanos')->name('contact');

// Service pages
Route::get('/cursos-grupales', 'HomeController@courses')->name('courses');
Route::get('/refuerzo', 'HomeController@reinforcement')->name('reinforcement');
Route::get('/traduccion', 'HomeController@translation')->name('translation');
Route::get('/interpretacion', 'HomeController@interpretation')->name('interpretation');

Route::get('/inscripcion-cursos', 'HomeController@inscripcionCursos')->name('inscripcionCursos');
Route::get('/inscripcion-refuerzo', 'HomeController@refuerzo')->name('refuerzo');

//Admin pages
Route::get('/admin', function () {
    return redirect('/login');
});
Route::get('/admin/dashboard', 'AdminController@index')->name('dashboard');
Route::get('/admin/dashboard2', 'AdminController@index2')->name('dashboard2');
// Courses
Route::get('/admin/cursos', 'CourseController@courses')->name('listCourses');
Route::get('/admin/coursesByPattern', 'CourseController@coursesByPattern')->name('admin.coursesByPattern');
Route::put('/admin/activeCourse', 'CourseController@activeCourse')->name('admin.activeCourse');
Route::put('/admin/deactiveCourse', 'CourseController@deactiveCourse')->name('admin.deactiveCourse');

Route::get('/admin/estudiantes-por-curso', 'CourseController@studentsByCourse')->name('studentsByCourse');

// Wompi
Route::match(['get', 'post'], '/test-wopmpi', 'WompiController@index');
Route::post('/test-wopmpi2', 'WompiController@index');
Route::get('/auth-wompi', 'WompiController@authWompi');

// Transactions
Route::get('/create-transaction', 'WompiController@testCreateTransaction');

// Auth
require __DIR__.'/auth.php';