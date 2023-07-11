<?php

use App\Http\Controllers\controllerAdminsBD;
use App\Http\Controllers\controllerAlumnosBD;
use App\Http\Controllers\controllerBibliotecaPersonalBD;
use App\Http\Controllers\controllerLibrosBD;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(viewController::class)->group(function(){
    Route::get('Inicio.Usu', 'viewInicio')->name('main');
    Route::get('Inicio.Admin', 'viewInicioAdmin')->name('main2');
    Route::get('/', 'viewOpen')->name('open');
    Route::get('Login.Alumnos', 'viewLoginAlumnos')->name('LogAlumnos');
    Route::get('SingIn.Alumnos', 'viewSingInAlumnos')->name('SingAlumnos');
    Route::get('SingIn.Admins', 'viewSingInAdmins')->name('SingAdmins');
    Route::get('Login.Admins', 'viewLoginAdmins')->name('LogAdmins');
    Route::get('Libros.Agregar', 'viewAddLibros')->name('addLibros');
});
Route::controller(controllerLibrosBD::class)->group(function(){
    Route::get('Biblioteca.Admin.{busqueda}','index')->name('library'); //Consulta de los libros
    Route::get('Biblioteca.{matricula}.{busqueda}', 'indexAlumno')->name('library.alumno');
    Route::post('Biblioteca.{matricula}.{busqueda}.search', 'indexAlumno')->name('library.alumno.search');
    Route::post('Biblioteca.{busqueda}.search', 'index')->name('library.search');
    Route::post('libros/store', 'store')->name('libros.store');
    Route::get('Libros.edit.{id}.{busqueda}', 'edit')->name('libros.edit');
    Route::PUT('libros/update/{id}/{busqueda}', 'update')->name('libros.update');
    Route::delete('libro/delete/{id}/{busqueda}', 'destroy')->name('libro.destroy');
    Route::get('BibliotecaInfo', 'masInfo')->name('MasInfo');
    Route::get('BibliotecaInfo.admin.{id}', 'masInfoAdmin')->name('MasInfoAdmin');
});
Route::controller(controllerAlumnosBD::class)->group(function(){
    Route::post('Alumnos/sesion', 'sesion')->name('Log');
    Route::post('Alumnos/store', 'store')->name('Alumno.store');
    Route::get('Alumno.editar.{matricula}', 'edit')->name('Alumno.edit');
    Route::get('Alumnos', 'showAlumnos')->name('alumnos.show');
    Route::PUT('Alumnos/update/{matricula}', 'update')->name('alumno.update');
    Route::delete('Alumno/delete/{matricula}', 'destroy')->name('alumno.destroy');
    Route::get('Alumno.setting.{matricula}', 'settingsA')->name('settA');
    Route::post('Alumno/settings/store/{matricula}', 'settingsStoreA')->name('setPostA');
});
Route::controller(controllerAdminsBD::class)->group(function(){
    Route::post('Admins/sesion', 'sesion')->name('Admin.sesion');
    Route::post('Admins/store', 'store')->name('Admin.store');
    Route::get('Admins.setting.{clave_id}', 'settings')->name('sett');
    Route::post('Admin/settings/store/{clave_id}', 'settingsStore')->name('setPost');
});
Route::controller(controllerBibliotecaPersonalBD::class)->group(function(){
    Route::post('agregar/store/{idlibro}/{matricula}/{busqueda}', 'store')->name('agregar.store');
    Route::get('BibliotecaPersonal.{matricula}', 'index')->name('myLibrary');
    Route::get('LibrosAlumno.{matricula}', 'showLibrosAlumno')->name('shAlumno');
    Route::PUT('librosAlumno/{matricula}/{id_libro}', 'entrega')->name('sh.library.update');
});