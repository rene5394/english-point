<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Modality;
use App\Models\Level;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function courses(){
        $courseModel = new Course();
        $courses = $courseModel->getCourses();
        $modalityModel = new Modality();
        $modalities = $modalityModel->getModalities();
        $levelModel = new Level();
        $levels = $levelModel->getLevels();
        return view('admin.courses.courses',[
            "courses"=>$courses,
            "modalities"=>$modalities,
            "levels"=>$levels
        ]);
    }

    public function coursesByPattern(Request $request){
        $courseModel = new Course();
        if($request->pattern === 'Modality'){
            $courses = $courseModel->getCoursesByModality($request->value);
        }
        if($request->pattern === 'Level'){
            $courses = $courseModel->getCoursesByLevel($request->value);
        }
        return $courses;
    }

    public function activeCourse(Request $request){
        $courseModel = new Course();
        $activated = $courseModel->activeCourse($request->courseid);
        if($activated){
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }

    public function deactiveCourse(Request $request){
        $courseModel = new Course();
        $deactivated = $courseModel->deactiveCourse($request->courseid);
        if($deactivated){
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500, "id"=>$request->courseid));
    }

    public function studentsByCourse(){
        $courseModel = new Course();
        $courses = $courseModel->getCourses();
        return view('admin.courses.students-courses',[
            "courses"=>$courses
        ]);
    }
}
