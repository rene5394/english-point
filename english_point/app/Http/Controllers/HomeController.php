<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Modality;
use App\Models\NotificationPreference;

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
}
