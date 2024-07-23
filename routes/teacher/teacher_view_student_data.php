<?php

use Illuminate\Support\Facades\Route;
use App\Services\StudentSubjectService;
use App\Services\FormatResponseService;

// restricted to teachers only
Route::get('/teacher/view_students', function () {

    $studentSubjectService = new StudentSubjectService;
    $studentSubjects = $studentSubjectService->getAllStudentSubjects();

    // for formatting the data we got from studentSubjects table
    // to make it organised to get from the client
    $formatResponseService = new FormatResponseService;
    $studentsData = $formatResponseService->formatResponseData($studentSubjects);

    return view('/teacher/view_student_data', compact('studentsData'));
})->middleware(['auth', 'verified', 'is_teacher'])->name('view_students');

require_once app_path() . '\Services\formatStudentSubjectServiceData.php';