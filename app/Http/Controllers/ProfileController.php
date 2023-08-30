<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\traits\media;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->is_admin == 0) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            return view('profile.index', compact('carts'));
        } else {
            return view('backend.profile.index');
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::user()->is_admin == 0) {
            return view('profile.edit');
        } else {
            return view('backend.profile.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::find($id);
        $data = $request->except('avatar');
        if ($request->has('avatar')) {
            //delete old photo
            $oldImageName = $user->avatar;
            if ($oldImageName) {
                $photoPath = public_path('images') . '\\' . $oldImageName;
                $this->deletePhoto($photoPath);
            }
            //upload new
            $newImageName = $this->uploadImage($request->avatar);
            $data['avatar'] = $newImageName;
        }
        $user->update($data);
        return redirect()->route('profile.index');
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
        return redirect()->route('login');
    }
}
