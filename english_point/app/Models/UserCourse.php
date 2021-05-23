<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class UserCourse extends Model
{
    use HasFactory;

    // selectOrCreateUserCourse check if UserCouse exist to use it or create it
    public function selectOrCreateUserCourse($courseid, $userid){
        // Check if users_courses exist
        DB::beginTransaction();
        try{
            $userCourse = DB::table('users_courses')
                ->where('users_courses.course_id', '=', $courseid)
                ->where('users_courses.user_id', '=', $userid)
                ->select('users_courses.id')
                ->first();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            $userCourse = null;
        }

        // Create a new users_courses
        if($userCourse == null){
            DB::beginTransaction();
            try {
                $userCourseInserted = DB::table('users_courses')->insertGetId([
                    'user_id' => Auth::user()->id,
                    'course_id' => $courseid
                ]);
                if($userCourseInserted > 0){
                    DB::commit();
                    return $userCourseInserted;
                }else{
                    DB::rollBack();
                    return false;
                }
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
            }
        }else{
            return $userCourse->id;
        }
        
    }

    // getStudentsByName returns users filtered by name
    public function getStudentsByName($name){
        DB::beginTransaction();
            try {
                $students = DB::table('users')
                    ->where('name', 'like' , $name . '%')
                    ->select('name', 'email', 'phone', 
                            DB::raw('DATE_FORMAT(created_at, "%M %d %Y %h:%i %p")as created_at')
                            )
                    ->get();
                DB::commit();
                return $students->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
            }
    }

    // getStudentsByCourse returns students by course
    public function getStudentsByCourse($courseid){
        DB::beginTransaction();
            try {
                $students = DB::table('users')
                    ->join('users_courses', 'users_courses.user_id', '=', 'users.id')
                    ->join('courses', 'courses.id', '=', 'users_courses.course_id')
                    ->where('courses.id', '=' , $courseid)
                    ->select('name', 'email', 'phone',
                            DB::raw('DATE_FORMAT(users.created_at, "%M %d %Y %h:%i %p")as created_at')
                            )
                    ->get();
                DB::commit();
                return $students->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
            }
    }

    // getCourseOfStudent returns the course id to which the user is subscribed    
    public function getCourseOfStudent($userid){
        DB::beginTransaction();
        try {
            $students = DB::table('users_courses')
                ->where('users_courses.user_id', '=' , $userid)
                ->first();
            DB::commit();
            return $students->course_id;
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
