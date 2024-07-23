<?php

use Illuminate\Support\Facades\Route;

// restricted to teachers only
Route::get('/teacher/view_students', function () {
    return view('/teacher/view_student_data');
})->middleware(['auth', 'verified', 'is_teacher'])->name('view_students');