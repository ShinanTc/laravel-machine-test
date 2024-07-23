<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    // taking current user role
    $userRole = auth()->user()->user_role;

    return view('dashboard', compact('userRole'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/teacher/teacher_add_student.php';
require __DIR__.'/teacher/teacher_add_subject.php';
require __DIR__.'/teacher/teacher_add_marks.php';
require __DIR__.'/teacher/teacher_view_student_data.php';