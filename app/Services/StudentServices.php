<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class StudentService {
    public function createStudent(string $name, string $email, string $password, int $age, int $standard)
    {

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'user_role' => 'student',
        ]);

        event(new Registered($user));

        return $user;
    }

    // Find student
    public function findStudent(string $studentName)
    {
        $student = User::where('name', $studentName)
                        ->where('user_role', 'student')
                        ->first();

        // Handle potential errors
        if (!$student) {
            return back()->withErrors(['student-name' => 'Student not found.']);
        }
        
        return $student;
    }
    
}
