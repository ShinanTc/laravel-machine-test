<?php

use Illuminate\Support\Facades\Route;
use App\Services\StudentService;
use App\Services\SubjectService;
use App\Services\StudentSubjectService;

// restricted to teachers only
Route::get('/teacher/add_marks', function () {
    return view('/teacher/add_marks');
})->middleware(['auth', 'verified', 'is_teacher'])->name('add_marks');

// add marks
Route::post('/teacher/add_marks', function (Request $request) {

    // deconstructing request body values
    $studentName = Request::input('student-name');
    $subjectName = Request::input('subject-name');
    $mark = Request::input('subject-mark');

    $studentService = new StudentService;
    $subjectService = new SubjectService;
    $studentSubjectService = new StudentSubjectService;

    // find student & subject
    $student = $studentService->findStudent($studentName);
    $subject = $subjectService->findSubject($subjectName);

    // mark subjects of students
    $studentSubject = $studentSubjectService->markStudentSubject($student->id, $subject->id, $mark);

})->middleware(['auth', 'verified', 'is_teacher'])->name('added_marks');

require_once app_path() . '\Services\StudentSubjectServices.php';