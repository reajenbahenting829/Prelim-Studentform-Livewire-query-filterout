<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view('student.student-form');
    }
    public function edit($id) {
        return view('student.edit', compact('id'));
    }
}
