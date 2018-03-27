<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassInformation;
use App\Models\ClassTeaching;

class ClassTeachingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = ClassTeaching
            ::where('teacher_id', \Auth::user()->userable->id)
            ->get()
            ->toArray();

        return array_map(function ($item) {
            unset($item['teacher']);
            return $item;
        }, $results);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = ClassTeaching
            ::where('teacher_id', \Auth::user()->userable->id)
            ->findOrFail($id)
            ->toArray();

        unset($result['teacher']);
        return $result;
    }
}
