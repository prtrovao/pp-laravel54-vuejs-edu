<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassInformation;

class ClassInformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = \Auth::user()->userable;
        $results = $student->classInformations;
        /*$results = ClassInformation
            ::byStudent(\Auth::user()->userable->id)
            ->get();*/

        return $results;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = \Auth::user()->userable;
        $result = $student->classInformations()->findOrFail($id);
        /*$result = ClassInformation
            ::byStudent(\Auth::user()->userable->id)
            ->findOrFail($id);*/
        return $result;
    }
}
