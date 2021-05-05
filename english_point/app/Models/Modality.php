<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class Modality extends Model
{
    use HasFactory;

    public function getModalities(){
        DB::beginTransaction();
            try {
                $courses = DB::table('course_modalities')
                    ->select('id','modality')
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }
}
