<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Modality;
use App\Models\Level;

class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function courses(){
        if(Auth::user()->role_id === 1){
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
        return redirect('/sin-autorizacion');
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
        if(Auth::user()->role_id === 1){
            $courseModel = new Course();
            $courses = $courseModel->getCourses();
            $modalityModel = new Modality();
            $modalities = $modalityModel->getModalities();
            $levelModel = new Level();
            $levels = $levelModel->getLevels();
            return view('admin.courses.students-courses',[
                "courses"=>$courses,
                "modalities"=>$modalities,
                "levels"=>$levels
            ]);
        }
        return redirect('/sin-autorizacion');
    }

    public function studentsByPattern(Request $request){
        $userCourseModel = new UserCourse();
        if($request->pattern === 'Name'){
            $students = $userCourseModel->getStudentsByName($request->value);
        }
        if($request->pattern === 'Course'){
            $students = $userCourseModel->getStudentsByCourse($request->value);
        }
        return $students;
    }
}
