<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function isAdmin(){
        return view('dashboard.admin.home');
    }

    public function isTeacher(){
        return view('dashboard.teacher.home');
    }

    public function isStudent(){
        return view('dashboard.student.home');
    }
}
