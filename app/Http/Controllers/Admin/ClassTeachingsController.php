<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassStudentRequest;
use App\Http\Requests\ClassTeachingRequest;
use App\Models\ClassInformation;
use App\Models\ClassTeaching;
use App\Models\Student;

class ClassTeachingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,ClassInformation $class_information)
    {
        if(!$request->ajax()) {
            return view('admin.class_informations.class_teaching', compact('class_information'));
        }else{
            return $class_information->teachings()->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassTeachingRequest $request,ClassInformation $class_information)
    {
        $teaching = $class_information->teachings()->create([
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
        ]);
        return $teaching;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassInformation $class_information, ClassTeaching $teaching)
    {
        $teaching->delete();
        return response()->json([],204); //status code - no content
    }
}
