<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Mail;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Transaction;
use App\Http\Controllers\WompiController;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('student.dashboard');
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
                        $idCourseModel = $userCourseModel->createUserCourse($request->courseid);
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
