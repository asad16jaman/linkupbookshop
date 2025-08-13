<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart($id)
    {
        $product = Book::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $request->qty ?? 1;
        } else {
            
            $newItem = [
            $id => [
                "name" => $product->name,
                "author" => $product->author,
                "uuid" => $product->uuid,
                'discount' => $product->discount,
                "qty" => $request->qty ?? 1,
                "price" => $product->price,
                'image' => asset('storage/' . $product->picture)
            ]
        ];

        // Prepend new item before existing cart
        $cart = $newItem + $cart;
        }
        session()->put('cart', $cart);
        return response()->json([
            "status" => true,
            "message" => "Successfully Added In Cart",
            'content' => $this->cartJson(),
            'totalItem' => $this->totalItems(),
            'totalPrice' => $this->totalPrice()
        ]);
    }
    public function cart()
    {
        $carts = session()->get('cart', []);

        return view('user.cart', compact('carts'));
    }

    public function cartJson()
    {
        return session()->get('cart', []);
    }
   
    public function increment($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
                $cart[$id]['qty'] += 1;
            session()->put('cart', $cart);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully Increased!",
            'content' => $this->cartJson(),
            'totalPrice' => $this->totalPrice()
        ]);
    }

    public function decrement($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $qty = $cart[$id]['qty'];

            if ($qty <= 1) {
                unset($cart[$id]);
            } else {
                $cart[$id]['qty'] -= 1;
            }

            session()->put('cart', $cart);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully Decreased Quentity!",
            'content' => $this->cartJson(),
            'totalPrice' => $this->totalPrice()
        ]);
    }


    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json([
            "status" => true,
            "message" => "Successfully Removed!",
            'content' => $this->cartJson(),
            'totalPrice' => $this->totalPrice()
        ]);
    }

    public function totalPrice()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;  
    }

    public function totalItems()
    {
        $cart = session()->get('cart', []);
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['qty'];
        }
        return $count;  
    }


}