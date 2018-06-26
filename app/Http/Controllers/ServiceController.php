<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Storage;
use App\Http\Requests\StoreService;
use App\Http\Requests\StoreEditService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view("admin.services.index",compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.services.create",compact('services '));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService $request)
    {
        $service = new Service;
        $service->name = $request->name;
        $service->contenu = $request->contenu;
        $service->image = $request->image->store('','imgService');
        $service->save();
        return redirect()->route("services.index");
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
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditService $request, Service $service)
    {
        $service->name = $request->name;
        $service->contenu = $request->contenu;
        if ($request->image != null)
        {
            Storage::disk('imgService')->delete($service)->image;
            $service->image = $request->image->store('','imgService');
        }
        $service->save();
        return redirect()->route('services.index',['service'=> $service->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('services.index');
    }
}
