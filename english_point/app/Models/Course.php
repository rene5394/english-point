<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory;

    public function getCourses(){
        DB::beginTransaction();
            try {
                $courses = DB::table('courses')
                    ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                    ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                    ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                    ->select('courses.id', 'price', 'modality', 'schedule', 'level', 'active',
                            DB::raw('DATE_FORMAT(courses.created_at, "%M %d %Y %h:%i %p")as created_at'),
                            DB::raw('DATE_FORMAT(courses.updated_at, "%M %d %Y %h:%i %p")as updated_at')
                            )
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }

    public function getCoursesByModality($modality_id){
        DB::beginTransaction();
            try {
                $courses = DB::table('courses')
                    ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                    ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                    ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                    ->where('course_modality_id', '=' , $modality_id)
                    ->select('courses.id', 'price', 'modality', 'schedule', 'level', 'active',
                            DB::raw('DATE_FORMAT(courses.created_at, "%M %d %Y %h:%i %p")as created_at'),
                            DB::raw('DATE_FORMAT(courses.updated_at, "%M %d %Y %h:%i %p")as updated_at')
                            )
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }

    public function getCoursesByLevel($level_id){
        DB::beginTransaction();
            try {
                $courses = DB::table('courses')
                    ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                    ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                    ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                    ->where('course_level_id', '=' , $level_id)
                    ->select('courses.id', 'price', 'modality', 'schedule', 'level', 'active',
                            DB::raw('DATE_FORMAT(courses.created_at, "%M %d %Y %h:%i %p")as created_at'),
                            DB::raw('DATE_FORMAT(courses.updated_at, "%M %d %Y %h:%i %p")as updated_at')
                            )
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }    

    public function activeCourse($courseid){
        DB::beginTransaction();
        try {
            $courseActivated  = DB::table('courses')
                ->where('id', '=', $courseid)
                ->update(['active' => 1]);
            if($courseActivated === 1){
            DB::commit();
            return true;
            }
            DB::rollBack();
            return false;
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deactiveCourse($courseid){
        DB::beginTransaction();
        try {
            $courseDeactivated  = DB::table('courses')
                ->where('id', '=', $courseid)
                ->update(['active' => 0]);
            if($courseDeactivated === 1){
            DB::commit();
            return true;
            }
            DB::rollBack();
            return false;
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getCourse($courseid){
        DB::beginTransaction();
            try {
                $course = DB::table('courses')
                    ->where('courses.id', '=', $courseid)
                    ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                    ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                    ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                    ->select('courses.id', 'price', 'modality', 'schedule', 'level', 'active',
                            DB::raw('DATE_FORMAT(courses.created_at, "%M %d %Y %h:%i %p")as created_at'),
                            DB::raw('DATE_FORMAT(courses.updated_at, "%M %d %Y %h:%i %p")as updated_at')
                            )
                    ->get();
                DB::commit();
                return $course->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
            }
    }
}
