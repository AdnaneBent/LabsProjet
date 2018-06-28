<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caroussel;

class FrontController extends Controller
{
    public function welcome(){
        $carousselImg = Caroussel::all();
        return view("welcome",compact('carousselImg'));
    }
}
