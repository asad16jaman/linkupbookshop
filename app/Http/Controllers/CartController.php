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
            
            $cart[$id] = [
                "name" => $product->name,
                "author" => $product->author,
                "qty" => $request->qty ?? 1,
                "price" => $product->price,
                "image" => $product->picture,
            ];
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
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function cartJson()
    {
        return session()->get('cart', []);
    }
   
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $qty = $request->qty;

            if ($qty <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['qty'] = $qty;
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }
    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
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
