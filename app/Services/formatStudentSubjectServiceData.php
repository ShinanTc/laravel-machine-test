<?php

namespace App\Services;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;

class FormatResponseService
{
    public function formatResponseData($responseData)
    {

        $processedData = collect($responseData)->map(function ($data) {

            $student = User::find($data['student_id']);
            $subject = Subject::find($data['subject_id']);

            return [
                'id' => $data['id'],
                'student_name' => $student ? $student->name : null,
                'subject_name' => $subject ? $subject->name : null,
                'marks' => $data['marks'],
                'status' => $data['status'],
            ];
        });

        return $processedData;
    }
}
