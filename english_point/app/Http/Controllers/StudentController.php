<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Mail;
use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Transaction;
use App\Models\NotificationPreference;
use App\Http\Controllers\WompiController;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $userModel = new User();
        $userData = $userModel->getUserData(Auth::user()->id);
        $preferenceModel = new NotificationPreference();
        $preferences = $preferenceModel->getNotificationPreferences();
        return view('student.dashboard',[
            'userData'=> $userData,
            'preferences' => $preferences
        ]);
    }

    public function myTransactions(){
        $transactionModel = new Transaction();
        $transactions = $transactionModel->getTransactions(Auth::user()->id);
        return view('student.my-transactions',[
            'transactions'=> $transactions
        ]);
    }

    public function editStudentInfo(Request $request){
        if($request->name && $request->email && $request->address && $request->phone && $request->preference){
            $userModel = new User();
            // Create credit card object
            $user = new \stdClass;
            $user->id = Auth::user()->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->preference = $request->preference;
            $userInfoEdited = $userModel->editUserData($user);
            if($userInfoEdited){
                return json_encode(array("status"=>200, "val"=>$userInfoEdited));  
            }
            return json_encode(array("status"=>500, "val"=>$userInfoEdited));
        }
    }

    public function paySubscriptionPage($courseid){
        $courseModel = new Course();
        $course = $courseModel->getCourse($courseid);
        return view('student.pay-subscription',[
            'course'=> $course
        ]);
    }

    public function paySubscription(Request $request){
        if($request->courseid && $request->name && $request->number && $request->cvc){
            if($request->expmonth && $request->expyear){
                // Get price from course object
                $courseModel = new Course();
                $course = $courseModel->getCoursePrice($request->courseid);
                $amount = floatval($course->price);
                // Create credit card object
                $card = new \stdClass;
                $card->number = $request->number;
                $card->cvc = $request->cvc;
                $card->expire_month = intval($request->expmonth);
                $card->expire_year = intval($request->expyear);
                // Create user object
                $user = new \stdClass;
                $user->name = $request->name;
                $user->email = Auth::user()->email;
                // Create Wompi transaction
                $wompiController = new WompiController;
                $result = $wompiController->createTransaction($card, $amount, $user);
                // Check if there is an error on Wompi transaction
                if($result[0] === false){
                    $transaction = $result[1];
                    if($transaction->esAprobada){ //&& $transaction->esReal
                        $userCourseModel = new UserCourse();
                        $idCourseModel = $userCourseModel->selectOrCreateUserCourse($request->courseid, Auth::user()->id);
                        $transactionModel = new Transaction();
                        $transactionCreated = $transactionModel->createTransaction($idCourseModel, $transaction);
                        if($transactionCreated){
                            return json_encode(array("status"=>200, "tran_status"=>$transaction->esAprobada)); 
                        }
                    }
                    return json_encode(array("status"=>200,"tran_status"=>$transaction->esAprobada));    
                }
                return json_encode(array("status"=>500,"errores"=>$result[1]));
            }
        }else{
            return json_encode(array("status"=>501));
        }
    }
}
