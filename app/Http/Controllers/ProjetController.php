<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use Storage;
use App\Http\Requests\StoreProjet;
use App\Http\Requests\StoreEditProjet;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();
        return view("admin.projets.index",compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.projets.create",compact('projets '));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjet $request)
    {
        $projet = new Projet;
        $projet->name = $request->name;
        $projet->contenu = $request->contenu;
        $projet->image = $request->image->store('','imgProjet');

        $image = [
            "name" => $request->image,
            "disk" => "imgProjet",
            "w" => 372,
            "h" => 271
        ];

        $projet->save();
        return redirect()->route("projets.index");
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
    public function edit(Projet $projet)
    {
        return view('admin.projets.edit', compact('projet'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditProjet $request, Projet $projet)
    {
        $projet->name = $request->name;
        $projet->contenu = $request->contenu;
        if ($request->image != null)
        {
            Storage::disk('imgProjet')->delete($projet)->image;
            $projet->image = $request->image->store('','imgProjet');
    
        }


        $image = [
            "name" => $request->image,
            "disk" => "imgProjet",
            "w" => 372,
            "h" => 271
        ];

        $projet->save();
        return redirect()->route('projets.index',['projet'=> $projet->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Projet::find($id);
        $projet->delete();
        return redirect()->route('projets.index');
    }
}