<?php

use Illuminate\Support\Facades\Route;

// restricted to teachers only
Route::get('/teacher/add_marks', function () {
    return view('/teacher/add_marks');
})->middleware(['auth', 'verified', 'is_teacher'])->name('add_marks');