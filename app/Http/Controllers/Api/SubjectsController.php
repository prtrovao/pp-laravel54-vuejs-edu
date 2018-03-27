<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');

        return $search ?Subject::where('name','LIKE', '%'.$search.'%')->get():[];

    }
}
