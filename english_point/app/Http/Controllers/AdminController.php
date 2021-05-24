<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Modality;
use App\Models\Level;
use App\Models\NotificationPreference;

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

    public function createUser(){
        if(Auth::user()->role_id === 1){
            $preferenceModel = new NotificationPreference();
            $preferences = $preferenceModel->getNotificationPreferences();
            return view('admin.createUser',[
                "preferences"=>$preferences
            ]);
        }
        return redirect('/sin-autorizacion');
    }

    // Store the data comes from the subcription form
    public function registerStudent(Request $request){
        if($request->fullname && $request->email && $request->password && $request->password2){
            if($request->address && $request->phone && $request->preference){
                $user = new User();
                $userCreated = $user->createStudent($request);
                if($userCreated){
                    return redirect('/admin/usuario-agregado-exitosamente');
                }
            }
        }
        return redirect('/admin/usuario-no-agregado');
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
