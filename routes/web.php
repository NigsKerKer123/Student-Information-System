<?php

use Illuminate\Support\Facades\Route;

//controllers
use App\Http\Controllers\studentController;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\subjectController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //student crud
    Route::get('/student', [studentController::class, 'index'])->name('studentlist');
    Route::post('/student/create', [studentController::class, 'create'])->name('studentCreate');
    Route::put('/student/{id}', [studentController::class, 'edit'])->name('studentEdit');
    Route::delete('/student/{id}', [studentController::class, 'delete'])->name('studentDelete');
    Route::post('/student/enroll', [studentController::class, 'enroll'])->name('enrollstudent');

    //subject crud
    Route::get('/subject', [subjectController::class, 'index'])->name('subject');
    Route::post('/subject/create', [subjectController::class, 'create'])->name('subjectCreate');
    Route::put('/subject/{id}', [subjectController::class, 'edit'])->name('subjectEdit');
    Route::delete('/subject/{id}', [subjectController::class, 'delete'])->name('subjectDelete');

    //grade
    Route::get('/grade',[gradeController::class, 'index'])->name('grade');
    Route::put('/grade/student', [gradeController::class, 'grade'])->name('gradeStudent');
    Route::delete('/grade/remove', [gradeController::class, 'remove'])->name('gradeRemove');
});
