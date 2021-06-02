<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Modality;
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

    // No authorization page
    public function noAuth(){
        return view('no-auth');
    }

    // Contact form
    public function contactForm(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->message != ''){
            $to = env("MAIL_TO");
            $cc = env("MAIL_CC");
            \Mail::send('mail.contactForm',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'emailMessage' => $request->message
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array(env("MAIL_USERNAME")=>"English Point"));
                $messageInner->to($to)->cc($cc)->subject('Formulario de Contacto');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }

    // Contact form Cursos
    public function contactFormCursos(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->address != '' && $request->notification != '' && $request->level != '' && $request->modality != ''){
            $to = env("MAIL_TO");
            $cc = env("MAIL_CC");
            \Mail::send('mail.contactFormCursos',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'notification' => $request->notification,
                'level' => $request->level,
                'modality' => $request->modality,
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array(env("MAIL_USERNAME")=>"English Point"));
                $messageInner->to($to)->cc($cc)->subject('Formulario de Cursos Grupales');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }

    // Contact form Refuezo
    public function contactFormRefuerzo(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->notification != '' && $request->hours != ''){
            $to = env("MAIL_TO");
            $cc = env("MAIL_CC");
            \Mail::send('mail.contactFormRefuerzo',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notification' => $request->notification,
                'hours' => $request->hours,
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array(env("MAIL_USERNAME")=>"English Point"));
                $messageInner->to($to)->cc($cc)->subject('Formulario de Refuerzo');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }

    // Contact form Traduccion
    public function contactFormTraduccion(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->notification != '' && $request->document != ''){
            $to = env("MAIL_TO");
            $cc = env("MAIL_CC");
            \Mail::send('mail.contactFormTraduccion',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notification' => $request->notification,
                'document' => $request->document,
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array(env("MAIL_USERNAME")=>"English Point"));
                $messageInner->to($to)->cc($cc)->subject('Formulario de Traducción');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }

    // Contact form Interpretacion
    public function contactForminterpretacion(Request $request){
        if($request->name != '' && $request->email != '' && $request->phone != '' && $request->notification != '' && $request->details != ''){
            $to = env("MAIL_TO");
            $cc = env("MAIL_CC");
            \Mail::send('mail.contactFormInterpretacion',
            array(
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'notification' => $request->notification,
                'details' => $request->details
            ), function($messageInner) use($to, $cc){
                $messageInner->from(Array(env("MAIL_USERNAME")=>"English Point"));
                $messageInner->to($to)->cc($cc)->subject('Formulario de Interpretación');
            });
            return json_encode(array("status"=>200));
        }
        return json_encode(array("status"=>500));
    }
}
