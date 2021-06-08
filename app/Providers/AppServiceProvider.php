<?php

namespace App\Providers;

use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\cart;
use App\Models\news;
use App\Models\size;
use App\Models\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer("*", function ($view) {
            $wishlist = NULL;
            if (Auth::check()) {
                $wishlist = wishlist::where('user_id', Auth::user()->id)->get();
            }
            $blogs3 = news::orderBy('id', 'DESC')->limit(3)->get();
            $highestPrice = product::orderBy('price', 'DESC')->first();
            $prodSale = product::prodsale();
            $cates5 = category::paginate(5);
            $cateList = category::all();
            $colorAll = color::all();
            $cart = new cart();
            $sizeAll = size::all();
            $view->with(compact('colorAll', 'cateList', 'prodSale', 'cates5', 'highestPrice', 'cart', 'sizeAll', 'blogs3', 'wishlist'));
        });

        //
    }
}
