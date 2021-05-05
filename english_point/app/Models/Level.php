<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class Level extends Model
{
    use HasFactory;

    public function getLevels(){
        DB::beginTransaction();
            try {
                $courses = DB::table('course_levels')
                    ->select('id', 'level')
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }
}
