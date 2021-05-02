<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function courses(){
        $courseModel = new Course();
        $courses = $courseModel->getCourses();
        return view('admin.courses.courses',[
            "courses"=>$courses
        ]);
    }

    public function studentsByCourse(){
        $courseModel = new Course();
        $courses = $courseModel->getCourses();
        return view('admin.courses.students-courses',[
            "courses"=>$courses
        ]);
    }
}
