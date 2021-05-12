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

    public function getTransactions($userid){
        DB::beginTransaction();
        try {
            $transactions = DB::table('transactions')
                ->join('users_courses', 'users_courses.id', '=', 'transactions.users_courses_id')
                ->join('users', 'users.id', '=', 'users_courses.user_id')
                ->join('courses', 'courses.id', '=', 'users_courses.course_id')
                ->join('course_levels', 'course_levels.id', '=', 'courses.course_level_id')
                ->join('course_modalities', 'course_modalities.id', '=', 'courses.course_modality_id')
                ->where('users.id', '=', $userid)
                ->select('modality', 'level', 'wompi_id_transaction', 'amount',
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

}
