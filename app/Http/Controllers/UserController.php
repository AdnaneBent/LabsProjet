<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\StoreUser;
use App\Services\imageResize;

class UserController extends Controller
{

     public function __construct(ImageResize $imageResize){
        $this->imageResize = $imageResize;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortByDesc('created_at');
        $roles = Role::all();
        return view("admin.users.index",compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view("admin.users.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = $request->password;
        if($request->image != NULL){
            $user->image = $request->image->store('','imgUser');
        }
        if($request->poste != NULL){
            $user->poste = $request->poste;
        }

        $image = [
            "name" => $request->image,
            "disk" => "imgUser",
            "w" => 360,
            "h" => 448
        ];
        $article->image = $this->imageResize->imageStore($image);
        $user->email = $request->email;
        $user->roles_id1 = $request->roles_id1;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
         return view("admin.users.show",compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles= Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, User $user)
    {
        $user->name = $request->name;
        if($request->password != NULL)
        {
            $user->password = bcrypt($request->password);
        }
        if($request->image != NULL){
            $user->image = $request->image->store('','imgUser');
        }
        if($request->poste != NULL){
            $user->poste = $request->poste;
        }

        $image = [
            "name" => $request->image,
            "disk" => "imgUser",
            "w" => 360,
            "h" => 448
        ];
        $user->image = $this->imageResize->imageStore($image);
        $user->email = $request->email;
        $user->roles_id1 = $request->roles_id1;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
