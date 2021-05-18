<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Modality;
use App\Models\Level;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::user()->role_id === 1){
            return view('admin.dashboard');
        }
        return redirect('/sin-autorizacion');
    }

    public function transactions(){
        if(Auth::user()->role_id === 1){
            $courseModel = new Course();
            $courses = $courseModel->getCourses();
            $modalityModel = new Modality();
            $modalities = $modalityModel->getModalities();
            $levelModel = new Level();
            $levels = $levelModel->getLevels();
            $transactionModel = new Transaction();
            $transactions = $transactionModel->getTransactions();
            return view('admin.transactions.transactions',[
                "courses"=>$courses,
                "modalities"=>$modalities,
                "levels"=>$levels,
                "transactions"=>$transactions
            ]);
        }
        return redirect('/sin-autorizacion');
    }

    public function loadTransactions(Request $request){
        if($request){
            $transactionModel = new Transaction();
            $transactions = $transactionModel->loadTransactions($request);
            if($transactions){
                return $transactions;
            }
            return json_encode(array("status"=>400));
        }
        return json_encode(array("status"=>500));
    }
}
