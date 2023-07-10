<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartItems()
    {
        
        $cartItems=session('cart');
        if($cartItems){
        
        $cart_items=[];
        foreach($cartItems as $key => $value)
        {
            $item=Item::find($key);
            array_push($cart_items,$item);
        }
        return view('cart',compact('cart_items'));
    }
    return view("cart");
    }

    public function addToCart($id)
    {
        if(!session()->has('cart'))

        {
            session(['cart'=>[$id=>1]]);

        }
        else
        {
           
            $cart_items=session('cart');
            if(!array_key_exists($id,$cart_items))
            {
                $cart_items[$id]=1;
            }
            else 
            {
                $quantity=Item::where('id', $id)->pluck('quantity')->first();
               
                if ($quantity > ($cart_items[$id]) )
                {
                 
                    $cart_items[$id] += 1;
                }
            }
            session(['cart'=>$cart_items]);
        }
        return redirect()->back();

    }


    public function updateCart(Request $request,$id)
    {
        $cart_items=session('cart');
        $cart_items[$id]=$request->quantity;
        session(['cart'=>$cart_items]);

        return redirect()->route('cart');

    }


    public function removeFromCart($id)

    {
        $cartItems=session('cart');
        foreach ($cartItems as $key=> $item)
        {
            if($key==$id)
            {
                unset($cartItems[$key]);
                break;
            }


        }
        session(['cart'=>$cartItems]);
        return redirect()->route('cart');
    }




    public function clearCart()
    {
        session()->forget('cart');

        return redirect('/');
    }
}
