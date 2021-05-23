<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB,Auth,Mail;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory;

    public function createTransaction($idCourseModel, $transaction){
        // Formating transaction info
        $isReal = 1;
        $isAproveed = 1;
        if($transaction->esReal == false){
            $isReal = 0;
        }
        if($transaction->esAprobada == false){
            $isAproveed = 0;
        }
        // Begin Transaction
        DB::beginTransaction();
        try {
            $ticketInserted = DB::table('transactions')->insertGetId([
                'wompi_id_transaction' => $transaction->idTransaccion,
                'is_real' => $isReal,
                'is_aproveed' => $isAproveed,
                'auth_code' => $transaction->codigoAutorizacion,
                'message' => $transaction->mensaje,
                'payment_method' => $transaction->formaPago,
                'amount' => $transaction->monto,
                'users_courses_id' => $idCourseModel
            ]);
            if($ticketInserted > 0){
                DB::commit();
                return true;
            }else{
                DB::rollBack();
                return false;
            }
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getUserTransactions($userid){
        DB::beginTransaction();
        try {
            $transactions = DB::table('transactions')
                ->join('users_courses', 'users_courses.id', '=', 'transactions.users_courses_id')
                ->join('users', 'users.id', '=', 'users_courses.user_id')
                ->join('courses', 'courses.id', '=', 'users_courses.course_id')
                ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                ->where('users.id', '=', $userid)
                ->orderBy('transactions.created_at', 'desc')
                ->select('modality', 'level', 'schedule', 'wompi_id_transaction', 'amount',
                        'transactions.created_at as created', 
                        DB::raw('DATE_FORMAT(transactions.created_at, "%M %d %Y %h:%i %p")as created_at')
                )
                ->get();
            DB::commit();
            return $transactions->toArray();
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getTransactions(){
        DB::beginTransaction();
        try {
            $transactions = DB::table('transactions')
                ->join('users_courses', 'users_courses.id', '=', 'transactions.users_courses_id')
                ->join('users', 'users.id', '=', 'users_courses.user_id')
                ->join('courses', 'courses.id', '=', 'users_courses.course_id')
                ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id')
                ->whereRaw("transactions.created_at BETWEEN CONCAT(CURDATE(), ' 00:00:00') - INTERVAL 7 DAY AND CONCAT(CURDATE(), ' 23:59:59')")
                ->orderBy('transactions.created_at', 'DESC')
                ->select('name','modality', 'level', 'schedule', 'wompi_id_transaction', 'amount',
                        DB::raw('DATE_FORMAT(transactions.created_at, "%M %d %Y %h:%i %p")as created_at')
                )
                ->get();
            DB::commit();
            return $transactions->toArray();
        }catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function loadTransactions($request){
            $date = Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
            $date2 = Carbon::createFromFormat('d/m/Y', $request->date2)->format('Y-m-d');
            $date = $date . ' 00:00:00';
            $date2 = $date2 . ' 23:59:59';
            $query = DB::table('transactions')
                ->select('name','modality', 'level', 'schedule', 'wompi_id_transaction', 'amount',
                    DB::raw('DATE_FORMAT(transactions.created_at, "%M %d %Y %h:%i %p")as created_at')
                )
                ->join('users_courses', 'users_courses.id', '=', 'transactions.users_courses_id')
                ->join('users', 'users.id', '=', 'users_courses.user_id')
                ->join('courses', 'courses.id', '=', 'users_courses.course_id')
                ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                ->join('course_schedules', 'course_schedules.id', '=', 'courses.course_schedule_id');
                // Where modality
                if($request->modality != ''){
                    $query->where('course_modalities.id', '=', $request->modality);
                }
                // Where level
                if($request->level != ''){
                    $query->where('course_levels.id', '=', $request->level);
                }
                // Where date
                if($request->date != '' && $request->date2 != ''){
                    $query->whereRaw("transactions.created_at BETWEEN '". $date ."' AND '". $date2 . "'");
                }
                // Get Transactions
                $transactions = $query->orderBy('transactions.created_at', 'DESC')
                ->get();
            return $transactions->toArray();
    }

}
