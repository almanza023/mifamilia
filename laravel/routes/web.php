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





Route::group(['middleware' => ['guest']], function () {

    Route::get('/','Auth\LoginController@showLoginForm')->name('view.login');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::get('/registrar','Auth\LoginController@register')->name('register');
    Route::get('/restablecer-clave','Auth\ResetController@index')->name('reset');
    Route::post('/reset','Auth\ResetController@resetPassword')->name('save');
    Route::post('/login', 'Auth\LoginController@login')->name('login');


});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('inicio','ViewController@index')->name('home');
    Route::get('busquedas','ViewController@busquedas')->name('busquedas');
    Route::get('focalizacion','ViewController@focalizacion')->name('focalizacion');
    Route::get('consultas','ViewController@consultas')->name('consultas');
    Route::get('profesionales','ViewController@profesionales')->name('profesionales');
    Route::get('historial','ViewController@historial')->name('historial');
    Route::get('segumiento','ViewController@seguimiento')->name('seguimiento');
    Route::get('cambiar-registro','ViewController@cambiarRegistro')->name('cambiar-registro');
    Route::get('estadisticas-unidad','ViewController@estadiscasUnidad')->name('estadisticas-unidad');


    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('perfil','ViewController@perfil')->name('perfil');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
