<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
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
}
