<?php

namespace App\Providers;

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
                
                
            });
    }
}
