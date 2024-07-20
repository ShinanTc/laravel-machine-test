<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// restricted to teachers only
Route::get('/teacher/add_student', function () {
    return view('/teacher/add_student');
})->middleware(['auth', 'verified','is_teacher'])->name('add_student');

Route::post('/teacher/add_student', function (Request $request) {

    // deconstructing request body values
    $name = Request::input('name');
    $email = Request::input('email');
    $age = Request::input('age');
    $standard = Request::input('standard');
    $password = Request::input('password');

    // create user data for students
    $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'user_role' => 'student'
    ]);

    event(new Registered($user));

})->middleware(['auth', 'verified','is_teacher'])->name('added_student');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
