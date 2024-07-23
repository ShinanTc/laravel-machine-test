<?php

use Illuminate\Support\Facades\Route;

// restricted to teachers only
Route::get('/student/view_progress_card', function () {
    return view('/student/student_view_progress_card');
})->middleware(['auth', 'verified'])->name('view_progress_card');
