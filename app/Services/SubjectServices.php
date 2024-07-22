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
}
