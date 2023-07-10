<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories=Category::all();
      
        return view('supermarket',compact("categories"));

    }


    public function showAll()
    {
        $categories=Category::all();
      
        return view('admin.all_categories',compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $path=$request->file('img')->store('categories','imgs');
       $new_category=Category::create([
    'name'=>$request->name,
    'description'=>$request->description,
    'img_path'=>$path


      ] );
      return view("admin.dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.edit_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if($request->file('img')){
        $path=$request->file('img')->store('categories','imgs');
        if(File::exists('imgs/'.$category->img_path)) {
            File::delete('imgs/'.$category->img_path);
        }
        }
        else{
        $path=$category->img_path;}
        $category->update(
            [
                'name'=>$request->name,
                'description'=>$request->description,
                'img_path'=>$path
            ]
            );
            return redirect()->route('showAll_categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $image_path= 'imgs/'.$category->img_path;
        $category=Category::destroy($category->id);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return redirect()->route('showAll_categories');
    }
}
