<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\traits\media;


class CategoryController extends Controller
{

    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.categoties.index', compact('categories'));
    }


    function show($id)
    {
        $category = Category::where('id', $id)->first();
        return view('backend.categoties.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categoties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('picture');
        if ($request->has('picture')) {
            $imageName = $this->uploadImage($request->picture);
            $data['picture'] = $imageName;
        }
        Category::create($data);
        return redirect()->route('categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categoties.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->except('picture');
        if ($request->has('picture')) {
            //delete old photo
            $oldImageName = $category->product;
            if ($oldImageName) {
                $photoPath = public_path('images') . '\\' . $oldImageName;
                $this->deletePhoto($photoPath);
            }
            //upload new
            $newImageName = $this->uploadImage($request->picture);
            $data['picture'] = $newImageName;
        }
        $category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $imageName = $category->picture;
        if ($imageName) {
            $photoPath = public_path('images') . '\\' . $imageName;
            $this->deletePhoto($photoPath);
        }
        $category->delete();
        return redirect()->route('categories.index');
    }
}