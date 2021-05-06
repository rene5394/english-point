<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

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

    public function index2(){
        if(Auth::user()->role_id === 1){
            return view('admin.dashboard2');
        }
        return redirect('/sin-autorizacion');
    }
}
