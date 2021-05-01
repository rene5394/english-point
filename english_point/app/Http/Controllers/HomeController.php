<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
