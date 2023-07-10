<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('admin.add_item',compact('categories'));
    }


    public function showAll()
    {
        $items=Item::all();
        return view('admin.all_items',compact('items'));
    }
     
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $path=$request->file('img_path')->store('items','imgs');
        $item=Item::create(
            [
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'img_path'=>$path,
                'price'=>$request->price,
                'name'=>$request->name,
                'quantity'=>0,
            ]
            );

            



            return redirect()->route('showAll_items');
    }

    /**
     * Display the specified resource.
     */
    public function show_items_in_category($category_id)
    {
        //
        $items=Item::where('category_id',$category_id)->latest()->get();

        return view('show_items',compact('items'));
    }
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
        $categories=Category::all();
        return view('admin.edit_item',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //

        if($request->file('img_path'))
        {
            $path=$request->file('img_path')->store('items','imgs');
            if(File::exists('imgs/'.$item->img_path)) {
                File::delete('imgs/'.$item->img_path);
            }
        }
        else
        {
            $path=$item->img_path;

        }

        $item->update([

            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'img_path'=>$path,
        ]);
        return redirect()->route('showAll_items');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //

         $image_path= 'imgs/'.$item->img_path;
        $item=item::destroy($item->id);
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return redirect()->route('showAll_items');
    }


    public function showInvertory()
    {
        $items=Item::all();
        return view('admin.invertory',compact('items'));
    }

    public function updateInvertory(Request $request , $id)
    {
        $item=Item::find($id);
        $newQuantity=$request->newQuantity+$item->quantity;
      $item->update(
        [
            'quantity'=>$newQuantity
        ]
        );
        return redirect()->route('showInvertory');
    }

}
