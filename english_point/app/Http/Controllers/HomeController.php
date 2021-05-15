<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Modality;
use App\Models\User;
use App\Models\NotificationPreference;
use Mail;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function courses(){
        return view('courses');
    }

    public function reinforcement(){
        return view('reinforcement');
    }

    public function translation(){
        return view('translation');
    }

    public function interpretation(){
        return view('interpretation');
    }

    // Load all the data in the subscription form
    public function inscripcionCursos(){
        $levelModel = new Level();
        $levels = $levelModel->getLevels();
        $modalityModel = new Modality();
        $modalities = $modalityModel->getModalities();
        $preferenceModel = new NotificationPreference();
        $preferences = $preferenceModel->getNotificationPreferences();
        return view('subscribe.courses',[
            "levels"=>$levels,
            "modalities"=>$modalities,
            "preferences"=>$preferences
        ]);
    }

    // Store the data comes from the subcription form
    public function registerStudent(Request $request){
        if($request->fullname && $request->email && $request->address && $request->phone){
            if($request->level && $request->modality && $request->size && $request->preference){
                $user = new User();
                $userCreated = $user->createStudent($request);
                if($userCreated){
                    return redirect('/login');
                }
            }
        }
    }

    // No authorization page
    public function noAuth(){
        return view('no-auth');
    }

    // Contact form
    public function contactForm(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->message != ''){
            $to = 'rene.uassistme@gmail.com';
            $cc = 'rene_edgardo_2@hotmail.com';
            \Mail::send('mail.contactForm',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'emailMessage' => $request->message
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array("app@uassistme.com"=>"DO NOT REPLY"));
                $messageInner->to($to)->cc($cc)->subject('Email Notifiaction Subject');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }
}
