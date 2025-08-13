<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    
    public function index(string $id){
        $book = Book::with('category')->where('uuid','=',$id)->first();
        return  view('user.book',compact('book'));
    }
}
