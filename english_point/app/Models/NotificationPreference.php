<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class NotificationPreference extends Model
{
    use HasFactory;

    public function getNotificationPreferences(){
        DB::beginTransaction();
            try {
                $courses = DB::table('notification_preferences')
                    ->select('id','preference')
                    ->get();
                DB::commit();
                return $courses->toArray();
            }catch (\Exception $e) {
                DB::rollBack();
                return false;
      }
    }
}
