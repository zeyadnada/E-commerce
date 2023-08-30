<?php

namespace App\Http\Controllers;

use App\Http\traits\media;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use media;
    public function index()
    {
        $users = User::get();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id);

        if ($user->is_admin == 0) {

            $user->is_admin = 1;
            $user->save();
            return redirect()->route('user.index')->with('message', 'User being Admin Successfully');
        } else {
            return redirect()->route('user.index')->with('message', 'This User Is already Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $imageName = $user->avatar;
        if ($imageName) {
            $photoPath = public_path('images') . '\\' . $imageName;
            $this->deletePhoto($photoPath);
        }
        $user->delete();
        return redirect()->route('user.index');
    }
}