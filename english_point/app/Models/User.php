<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use DB,Auth,Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // createStudent creates a new user as student
    public function createStudent($request){
        DB::beginTransaction();
        try {
            $user = DB::table('users')->where('users.email', '=', $request->email)->select('email')->first();
            if(!isset($user->email)){
                $userInserted = DB::table('users')->insertGetId([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'notification_preference_id' => $request->preference
                ]);
                if($userInserted > 0){
                    DB::commit();
                    return true;
                }else{
                    DB::rollBack();
                    return false;
                }
            }
            DB::rollBack();
            return false;
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    // getPassword returns the hash password
    public function getPassword($userid){
        DB::beginTransaction();
        try {
            $user = DB::table('users')
                ->where('id', '=', $userid)
                ->select('password')
                ->first();
            DB::commit();
            return $user->password;
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    // changePassword changes the password
    public function changePassword($userid, $pass){
        $passChanged = DB::table('users')
              ->where('id', '=', $userid)
              ->update(['password' => $pass]);
            if($passChanged === 1){
                return true;
            }
            return false;
    }

    // getUserData returns user's information
    public function getUserData($userid){
        DB::beginTransaction();
        try {
            $userData = DB::table('users')
                ->leftjoin('notification_preferences', 'notification_preferences.id', '=', 'users.notification_preference_id')
                ->where('users.id', '=', $userid)
                ->select('name', 'email', 'address', 'phone', 'preference', 'notification_preferences.id as noti_id')
                ->get();
            DB::commit();
            return $userData->toArray();
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    // editAdminData edits admin's information
    public function editAdminData($user){
            $userEdited = DB::table('users')
              ->where('id', '=', $user->id)
              ->update(['name' => $user->name, 'email' => $user->email
              ]);
            if($userEdited === 1){
                return true;
            }
            return false;
    }

    // editStudentData edits student's information
    public function editStudentData($user){
        $userEdited = DB::table('users')
          ->where('id', '=', $user->id)
          ->update(['name' => $user->name, 'email' => $user->email,
            'address' => $user->address, 'phone' => $user->phone,
            'notification_preference_id' => $user->preference
          ]);
        if($userEdited === 1){
            return true;
        }
        return false;
}
}
