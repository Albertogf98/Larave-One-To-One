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

Auth::routes();

Route::get('/', [App\Http\Controllers\GradesController::class, 'getHome'])->name('home')->middleware('auth');

Route::get('/teacher/create', [App\Http\Controllers\GradesController::class, 'getCreate'])->middleware('auth_user_type');
Route::post('/post/create', [App\Http\Controllers\GradesController::class, 'postCreate'])->middleware('auth_user_type');

Route::get('/teacher/delete/{id?}', [App\Http\Controllers\GradesController::class, 'getDelete'])->middleware('auth_user_type');
Route::delete('/post/delete', [App\Http\Controllers\GradesController::class, 'postDelete'])->middleware('auth_user_type');
Route::get('/post/delete', [App\Http\Controllers\GradesController::class, 'postDelete'])->middleware('auth_user_type');

Route::get('/teacher/edit/{idGrade?}/{idStudent?}', [App\Http\Controllers\GradesController::class, 'getEdit'])->middleware('auth_user_type');
Route::put('/put/edit', [App\Http\Controllers\GradesController::class, 'putEdit'])->middleware('auth_user_type');

Route::get('/register', function () {
    return redirect('/');
});
