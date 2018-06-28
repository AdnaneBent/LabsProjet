<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Storage;
use App\Http\Requests\StoreClient;
use App\Http\Requests\StoreEditClient;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view("admin.clients.index",compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.clients.create",compact('clients '));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->company = $request->company;
        $client->image = $request->image->store('','imgClient');
        $client->save();
        return redirect()->route("clients.index");
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
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditClient $request , Client $client)
    {
        
        $client->name = $request->name;
        $client->company = $request->company;
        if ($request->image != null)
        {
            Storage::disk('imgClient')->delete($client->image);
            $client->image = $request->image->store('','imgClient');
        }
        $client->save();
        return redirect()->route('clients.index',['client'=> $client->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        Storage::disk('imgClient')->delete($client->image);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
