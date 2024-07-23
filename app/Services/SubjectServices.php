<?php

namespace App\Services;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Models\Subject;

class SubjectService {
    public function createSubject(string $name)
    {
        // Create new Subject model instance
        $subject = Subject::create([
            'name' => $name,
        ]);

        event(new Registered($subject));
        
        return $subject;
    }

    // Find Subject by id
    public function findSubjectbyId(int $subjectId)
    {
        $subject = Subject::where('id', $subjectId)->first();

        // Handle potential errors
        if (!$subject) {
            return back()->withErrors(['subject-name' => 'Subject not found.']);
        }

        return $subject;
    }

    // Find Subject
    public function findSubject(string $subjectName)
    {
        $subject = Subject::where('name', $subjectName)->first();

        // Handle potential errors
        if (!$subject) {
            return back()->withErrors(['subject-name' => 'Subject not found.']);
        }

        return $subject;
    }
    
}
