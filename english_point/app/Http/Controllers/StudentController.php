<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('student.dashboard');
    }

    public function paySubscription($courseid){
        $courseModel = new Course();
        $course = $courseModel->getCourse($courseid);
        dd($course);
    }
}
