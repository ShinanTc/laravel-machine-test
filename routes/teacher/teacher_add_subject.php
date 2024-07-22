<?php

use Illuminate\Support\Facades\Route;
use App\Services\SubjectService;

// restricted to teachers only
Route::get('/teacher/add_subject', function () {
    return view('/teacher/add_subject');
})->middleware(['auth', 'verified', 'is_teacher'])->name('add_subject');

// create new subject
Route::post('/teacher/add_subject', function (Request $request) {

    $subjectService = new SubjectService;

    // deconstructing request body values
    $name = Request::input('name');

    // create subject
    $user = $subjectService->createSubject($name);
    
})->middleware(['auth', 'verified', 'is_teacher'])->name('added_subject');

require_once app_path() . '\Services\SubjectServices.php';