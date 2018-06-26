<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caroussel;
use Storage;
use App\Http\Requests\StoreImgCaroussel;
use App\Http\Requests\StoreEditImgCaroussel;

class CarousselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caroussels = Caroussel::all();
        return view("admin.caroussels.index",compact('caroussels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.caroussels.create",compact('caroussels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImgCaroussel $request)
    {
        $caroussel = new Caroussel;
        $caroussel->name = $request->name;
        $caroussel->image = $request->image->store('','imgCaroussel');
        $caroussel->save();
        return redirect()->route("caroussels.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Caroussel $caroussel)
    {
         return view('admin.caroussels.edit', compact('caroussel'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditImgCaroussel $request, Caroussel $caroussel)
    {
        $caroussel->name = $request->name;
        if ($request->image != null){

            Storage::disk('imgCaroussel')->delete($caroussel)->image;
            $caroussel->image = $request->image->store('','imgCaroussel');
        }
        $caroussel->save();
        return redirect()->route('caroussels.index',['caroussel'=> $caroussel->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caroussel $caroussel)
    {
        if($caroussel->delete())
        {
            Storage::disk('imgCaroussel')->delete($caroussel->image);
            return redirect()->route('caroussels.index');
        };
    }
}
