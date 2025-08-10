<?php

namespace App\Http\Controllers\Admin;

use App\Models\BestSell;
use App\Models\Book;
use Exception;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function index(?int $id = null)
    {
        $searchValue = request()->query("search", null);
        $editItem = null;
        if (!is_null($id)) {
            $editItem = Book::with('category')->findOrFail($id);
        }
        $categories = Category::all();
        if ($searchValue != null) {
            $products = Book::with(['bestsell','category'])->where("name", "like", "%" . $searchValue . "%")->orderBy('id', 'desc')->simplePaginate(10);
        } else {
            $products = Book::with(['bestsell','category'])->orderBy('id', 'desc')->simplePaginate(10);
        }
        // return response()->json($products);

        return view('admin.productView', compact(['categories', 'products', 'editItem']));
    }



    public function store(Request $request, ?int $id = null)
    {
        $validationRules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|int',
            'total' => 'required',
        ];
        if ($id == null || $request->hasFile('picture')) {
            $validationRules['picture'] = 'required|image|mimes:jpeg,jpg,png,gif,webp,svg';
        }
        $request->validate($validationRules);
        $data = $request->only(['name', 'price', 'long_description', 'category_id', 'author', 'totalpage', 'total', 'publisher', 'discount']);
        if (!is_null($id)) {

            $currentEditUser = Book::findOrFail($id);
            try {
                if ($request->hasFile('picture')) {
                    //delete if user already have profile picture...
                    if ($currentEditUser->picture != null) {
                        Storage::delete($currentEditUser->picture);
                    }
                    $path = $request->file('picture')->store('bookthum');
                    $data['picture'] = $path;
                }
                Book::where('id', $id)->update($data);
                return redirect()->route('admin.book', ['page' => request()->query('page'), 'search' => request()->query('search')])->with('success', 'Successfully Product Updated!');
            } catch (Exception $e) {
                Log::error("this message is from : " . __CLASS__ . "Line is : " . __LINE__ . " messages is " . $e->getMessage());
                return redirect()->route('error');
            }
        }

        try {
            if ($request->hasFile('picture')) {
                $path = $request->file('picture')->store('bookthum');
                $data['picture'] = $path;
            }
            //creating product
            $product = Book::create($data);

            return redirect()->back()->with('success', 'Successfully Product Created!');
        } catch (Exception $e) {
            Log::error("this message is from : " . __CLASS__ . "Line is : " . __LINE__ . " messages is " . $e->getMessage());
            return redirect()->route('error');
        }
    }

    public function destroy(int $id)
    {
        try {

            $deleteBook = Book::findOrFail($id);
            // Delete main product picture
            if ($deleteBook->picture) {
                Storage::delete($deleteBook->picture);
            }
            $deleteBook->delete();
            return redirect()->route('admin.book')->with('success', 'Successfully Book Deleted!');
        } catch (Exception $e) {
            Log::error("this message is from: " . __CLASS__ . " Line: " . __LINE__ . " message: " . $e->getMessage());
            return redirect()->route('error');
        }
    }

    public function bestSelling(){

        $bestsells = BestSell::with('book')->get();

        return view('admin.bestsell', compact('bestsells'));
    }

    public function addBestSelling(int $id){
        $book = Book::findOrFail($id);
        BestSell::create([
            'book_id' => $book->id,
        ]);
        return redirect()->route('admin.book', ['page' => request()->query('page'), 'search' => request()->query('search')])->with('success', 'Successfully Added In BestSelling!');
    }

    public function removeBestSelling(int $id){

        
       BestSell::where('book_id','=', $id)->delete();
       return redirect()->back()->with('success', 'Successfully Remove From BestSelling!');
    }



}
