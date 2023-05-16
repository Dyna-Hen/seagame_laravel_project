<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Validators;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        $user = User::all();
        $user = UserResource::collection($user);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(2);
        $user = User::store($request);
        return response()->json(['success'=>true,'data'=>$user],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // dd(3);
        $user = User::find($id);
        $user = new UserResource($user);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd(4);
        $user = User::store($request, $id);
        return response()->json(['success'=>true,'data'=>$user],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // dd(5);
        $user = User::find($id);
        $user->delete();

        return "user has been deleted.";
    }
}
