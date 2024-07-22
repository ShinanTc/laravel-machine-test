<?php

use Illuminate\Support\Facades\Route;
use App\Services\StudentService;

// restricted to teachers only
Route::get('/teacher/add_student', function () {
    return view('/teacher/add_student');
})->middleware(['auth', 'verified', 'is_teacher'])->name('add_student');

// create student route
Route::post('/teacher/add_student', function (Request $request) {

    // deconstructing request body values
    $name = Request::input('name');
    $email = Request::input('email');
    $age = Request::input('age');
    $standard = Request::input('standard');
    $password = Request::input('password');

    $studentService = new StudentService;

    // create user data for students
    $user = $studentService->createStudent($name, $email, $password, $age, $standard);

})->middleware(['auth', 'verified','is_teacher'])->name('added_student');

require_once app_path() . '\Services\StudentServices.php';