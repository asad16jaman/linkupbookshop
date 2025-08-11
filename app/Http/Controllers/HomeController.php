<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Faq;
use App\Models\Area;
use App\Models\About;
use App\Models\Client;
use App\Models\Dealer;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Management;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function index(){

        $sliders = Slider::all();
        $categories = Category::latest()->take(3)->get();
        $feedbacks = Feedback::with('user')->latest()->get();
        $bestsells = Book::whereHas('bestsell')->orderBy('id', 'desc')->take(8)->get();
        $books = Book::take(8)->latest()->get();
        return view("user.index",compact(["sliders","categories",'feedbacks','bestsells','books']));
    }


    public function allBook(){

        $searValue = request()->query('search',null);
        if($searValue){
            $books = Book::where('name','like','%'.$searValue.'%')->latest()->simplePaginate(12);
        }else{
            $books = Book::latest()->simplePaginate(12);
        }
        return view('user.bookpage',compact(['books']));
    }

    public function bestsell(){
         $searValue = request()->query('search',null);
         if($searValue){
            $bestsell = Book::whereHas('bestsell')->where('name','like','%'.$searValue.'%')->get();
         }else{
            $bestsell = Book::whereHas('bestsell')->get();
         }
        return view('user.bestselling',compact('bestsell'));
    }

    public function about(){
        $about = About::first();
        return view('user.about',compact(['about']));
    }

}
