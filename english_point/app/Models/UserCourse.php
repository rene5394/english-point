<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class UserCourse extends Model
{
    use HasFactory;

    public function createUserCourse($courseid){
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
    }
}
