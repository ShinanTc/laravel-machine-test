<?php

namespace App\Services;

use Illuminate\Support\Facades\Event;
use App\Models\StudentSubjects;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;

class StudentSubjectService {
    public function markStudentSubject(int $studentId, int $subjectId, int $mark)
    {
        // Mark Student Subject
        $studentSubject = StudentSubjects::create([
            'student_id' => $studentId,
            'subject_id' => $subjectId,
            'marks' => $mark,
            'status' => $mark >= 50 ? 'pass' : 'fail'
        ]);

        event(new Registered($studentSubject));
        
        return $studentSubject;
    }

        // get all student subjects and marks
    public function getAllStudentSubjects()
    {
        $studentSubjects = StudentSubjects::all();

        if(!$studentSubjects){
            return back()->withErrors('Marks not found.');
        }

        return $studentSubjects;
        
    }
    
    // get specific student's subjects & marks
    public function getSingleStudentSubjects(int $studentId)
    {
        $studentSubject = StudentSubjects::where('student_id', $studentId)->get();

        if(!$studentSubject){
            return back()->withErrors('Marks not found.');
        }

        return $studentSubject;
        
    }

}
