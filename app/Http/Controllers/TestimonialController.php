<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\Client;
use Storage;
use App\Http\Requests\StoreTestimonial;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all()->sortByDesc('created_at');
        $client = Client::all();
        return view("admin.testimonials.index",compact('testimonials', 'client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view("admin.testimonials.create",compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonial $request)
    {
        $testimonial = new Testimonial;
        $testimonial->contenu = $request->contenu;
        $testimonial->clients_id = $request->clients_id;
        $testimonial->save();

        return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view("admin.testimonials.show",compact('testimonial'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $clients= Client::all();
        return view('admin.testimonials.edit', compact('testimonial', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestimonial $request, Testimonial $testimonial)
    {
        $testimonial->contenu = $request->contenu;
        $testimonial->clients_id = $request->clients_id;
        $testimonial->save();
        return redirect()->route('testimonials.show',['testimonial'=> $testimonial->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->route('testimonials.index');
    }
}
