<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SetController;
use App\Http\Controllers\Api\TermController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/user-info', [UserController::class, 'getUserInfo'])->name('user.info');
Route::group(['middleware' => ['VerifyAPIKey']], function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware(['auth:api']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/user-info', [UserController::class, 'getUserInfo'])->name('user.info');

        Route::group(['prefix' => 'course'], function () {
            Route::get('/', [CourseController::class, 'index'])->name('course.list');
            Route::get('/detail', [CourseController::class, 'getCourseDetail'])->name('course.detail');
        });

        Route::group(['prefix' => 'set'], function () {
            Route::get('/', [SetController::class, 'index'])->name('set.list');
            Route::get('/list', [SetController::class, 'getListSetByCourse'])->name('set.list.by-course');
            Route::get('/detail', [SetController::class, 'detail'])->name('set.detail');
        });

        Route::group(['prefix' => 'term'], function () {
            Route::get('/', [TermController::class, 'getListTermBySet'])->name('term.list.by-set');
        });
    });
});
