<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caroussel;
use App\Service;
use App\Testimonial;
use App\Client;

class FrontController extends Controller
{
    public function welcome(){
        $carousselImg = Caroussel::all();
        $servicesRandom = Service::orderByRaw("RAND()")->get()->take(3);
        $services = Service::orderBy("created_at", 'DESC')->paginate(9);
        $testimonials = Testimonial::all();
        $clients = Client::all();
        return view("welcome",compact('carousselImg','servicesRandom', 'services', 'testimonials', 'clients'));
    }


}
