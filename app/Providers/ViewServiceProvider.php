<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Wishlist;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

         View::composer('*', function ($view) {

                $data =  Company::all()->first();
                if($data){
                    $view->with('company',$data);
                }else{
                    $view->with('company',false);

                }


                $allCategories = Category::where('nav',true)->get();
                if($allCategories){
                    $view->with('categories',$allCategories);
                }else{
                    $view->with('categories',false);
                }

                $searchCat = Category::get();
                if($searchCat){
                    $view->with('searchCat',$searchCat);
                }else{
                    $view->with('searchCat',false);
                }
                

                //wishlist
                if(Auth::check()){
                    $count = Wishlist::where('user_id',Auth::user()->id)->count();
                    $wishProduct = Wishlist::with('book')->where('user_id',Auth::user()->id)->latest()->take(3)->get();
                    $wish = [
                        'count' => $count,
                        'products'=> $wishProduct
                    ];
                    $view->with('wish',$wish);
                }

                //handleing cart
                $cart = [
                    'content' => $this->cartJson(),
                    'totalItems' => $this->totalItems(),
                    'totalPrice' => $this->totalPrice()
                ];

                 $view->with('cartDetail',$cart);
                
            });
    }

    public function cartJson()
    {
        return session()->get('cart', []);
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
