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
Route::get('/sin-autorizacion', 'HomeController@noAuth')->name('no-auth');
Route::post('/contact-form', 'HomeController@contactForm')->name('contact-form');
Route::post('/contact-form-cursos', 'HomeController@contactFormCursos')->name('contact-form-cursos');
Route::post('/contact-form-refuerzo', 'HomeController@contactFormRefuerzo')->name('contact-form-refuerzo');
Route::post('/contact-form-traduccion', 'HomeController@contactFormTraduccion')->name('contact-form-traduccion');
Route::post('/contact-form-interpretacion', 'HomeController@contactFormInterpretacion')->name('contact-form-interpretacion');
// Service pages
Route::get('/cursos-grupales', 'HomeController@courses')->name('courses');
Route::get('/refuerzo', 'HomeController@reinforcement')->name('reinforcement');
Route::get('/traduccion', 'HomeController@translation')->name('translation');
Route::get('/interpretacion', 'HomeController@interpretation')->name('interpretation');
// Subscription pages
Route::get('/inscripcion-cursos', 'HomeController@inscripcionCursos')->name('inscripcionCursos');
Route::get('/inscripcion-refuerzo', 'HomeController@refuerzo')->name('refuerzo');
Route::post('register-student', 'HomeController@registerStudent')->name('registerStudent');

//Admin pages
Route::get('/admin', 'AdminController@index')->name('dashboard');
Route::get('/admin/dashboard2', 'AdminController@index2')->name('dashboard2');
Route::get('/admin/transacciones', 'AdminController@transactions')->name('transactions');
Route::get('/admin/load-transacciones', 'AdminController@loadTransactions')->name('loadTransactions');
// Courses
Route::get('/admin/cursos', 'CourseController@courses')->name('listCourses');
Route::get('/admin/coursesByPattern', 'CourseController@coursesByPattern')->name('admin.coursesByPattern');
Route::put('/admin/activeCourse', 'CourseController@activeCourse')->name('admin.activeCourse');
Route::put('/admin/deactiveCourse', 'CourseController@deactiveCourse')->name('admin.deactiveCourse');
// Students
Route::get('/admin/estudiantes-por-curso', 'CourseController@studentsByCourse')->name('studentsByCourse');
Route::get('/admin/studentsByPattern', 'CourseController@studentsByPattern')->name('admin.studentsByPattern');

//Student pages
Route::get('/estudiante', 'StudentController@index')->name('dashboardStudent');
Route::get('/estudiante/mis-transacciones', 'StudentController@myTransactions')->name('myTransactions');
Route::get('/estudiante/pagar-suscripcion/{course}', 'StudentController@paySubscriptionPage')->name('paySubscriptionPage');
Route::post('/estudiante/pagar-suscripcion', 'StudentController@paySubscription')->name('paySubscription');
Route::put('/estudiante/editar-informacion-estudiante', 'StudentController@editStudentInfo')->name('estudianteEditarInformacion');

// Wompi
Route::match(['get', 'post'], '/test-wopmpi', 'WompiController@index');
Route::post('/test-wopmpi2', 'WompiController@index');
Route::get('/auth-wompi', 'WompiController@authWompi');

// Transactions
Route::get('/create-transaction', 'WompiController@testCreateTransaction');

// Auth
require __DIR__.'/auth.php';