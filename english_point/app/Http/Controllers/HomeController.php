<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function courses(){
        $courseModel = new Course();
        $courses = $courseModel->getCourses();
        return view('courses',[
            "courses"=>$courses
        ]);
    }

    public function reinforcement(){
        return view('reinforcement');
    }

    public function translation(){
        return view('translation');
    }

    public function interpretation(){
        return view('interpretation');
    }
}
