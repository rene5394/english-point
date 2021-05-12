<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class UserCourse extends Model
{
    use HasFactory;

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
}
