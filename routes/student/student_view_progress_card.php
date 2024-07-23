<?php

use Illuminate\Support\Facades\Route;
use App\Services\SubjectService;
use App\Services\StudentSubjectService;
use App\Services\FormatResponseService;

Route::get('/student/view_progress_card', function () {

    $currentUserData = auth()->user();
    
    $studentSubjectService = new StudentSubjectService;
    $formatResponseService = new FormatResponseService;
    
    // if the current user is a student
    if($currentUserData->user_role === 'student'){
        $currentStudentMarks = $studentSubjectService->getSingleStudentSubjects($currentUserData->id);

        $studentData = $formatResponseService->formatResponseDataBySubject($currentStudentMarks);

        return view('/student/student_view_progress_card', compact('studentData'));
    }

    // else it would be a teacher (teacher can see the entire student result)
    $studentData = $studentSubjectService->getAllStudentSubjects($currentUserData->id);
    $studentData = $formatResponseService->formatResponseDataByUser($studentData);
    
    return view('/student/student_view_progress_card', compact('studentData'));
})->middleware(['auth', 'verified'])->name('view_progress_card');
