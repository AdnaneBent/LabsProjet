<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caroussel;
use App\Service;
use App\Testimonial;
use App\Client;
use App\Projet;
use App\Tag;
use App\Article;
use App\Categorie;
use App\Commentaire;
use App\User;
use App\Mail\ContactMail;
use App\Http\Requests\StoreContact;
use Mail;

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

    public function service(){
        $services = Service::orderBy("created_at", 'DESC')->paginate(9);
        $servicesRandom2 = Service::orderByRaw("RAND()")->get()->take(3);
        $servicesRandom1 = Service::orderByRaw("RAND()")->get()->take(3);
        $projets = Projet::orderBy("created_at", 'DESC')->paginate(3);
        return view("services",compact('services', 'projets', 'servicesRandom2', 'servicesRandom1'));
    }

    public function blog(){
        $categories = Categorie::all();
        $articles = Article::with('commentaires')->orderBy("created_at", 'DESC')->paginate(3);
        $tags = Tag::all();
        $testimonials = Testimonial::orderByRaw("RAND()")->get()->take(1);
        return view("blog",compact('testimonials','tags', 'articles', 'categories'));
    }

    public function blogShow(Article $article){
        $categories = Categorie::all();
        $tags = Tag::all();
        $testimonials = Testimonial::orderByRaw("RAND()")->get()->take(1);
        return view("blog-post",compact('testimonials','tags', 'article', 'categories','commentaires'));
    }

    public  function  contactMail(storeContact  $request){
        Mail::to(User::get())->send(new ContactMail($request));
    return redirect()->back();
    }

    public function commentaire(Request $request, $articles_id){
        $commentaire = new Commentaire;
        $commentaire->name = $request->name;
        $commentaire->contenu = $request->contenu;
        $commentaire->subject = $request->subject;
        $commentaire->email = $request->email;
        $commentaire->articles_id = $articles_id;

        $commentaire->save();

        return redirect()->back();

    }

    public function recherche(Request $request, )
}
