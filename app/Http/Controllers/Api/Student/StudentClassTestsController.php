<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentClassTestRequest;
use App\Models\ClassTest;
use App\Models\StudentClassTest;

class StudentClassTestsController extends Controller
{

    public function store(ClassTest $classTest, StudentClassTestRequest $request)
    {
        $studentClassTest = StudentClassTest::createFully($request->input() + [
                'student_id' => \Auth::user()->userable->id
            ]);
        return $studentClassTest;

    }

    public function show(ClassTest $classTest, $id)
    {
        if (!ClassTest::greatherDateEnd30Minutes($classTest->date_end)) {
            abort(403);
        }

        $result = StudentClassTest
            ::where('student_id', \Auth::user()->userable->id)
            ->findOrFail($id);

        return $result->toArray() + [
                'choices' => $result
                    ->choices
                    ->pluck('question_choice_id', 'question_id')
                    ->toArray()
            ];


    }
}
