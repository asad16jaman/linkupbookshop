<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Auth;
use App\Models\Book;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    //

    public function storeWishList(Request $request,int $id){
        $user_id = Auth::user()->id;
        $book = Book::findOrFail($id);
        $allready = Wishlist::where("user_id", $user_id)->where('book_id',$book->id)->get();
        if($allready->count() == 0){
            Wishlist::create([
                "user_id"=> $user_id,
                "book_id"=> $book->id,
            ]);
            return redirect()->back()->with("success","Successfully Added In WishList");
        }else{
            return redirect()->back()->with("success","This Product Already In Your WishList");
        }
        
    }

    public function updateWishList(Request $request,int $id){

        Wishlist::findOrFail($id)->delete();
        
        return redirect()->back()->with("success","Successfully Removed From Wishlist");
    }





}
