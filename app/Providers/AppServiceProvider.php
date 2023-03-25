<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Views\Composers\MultiComposer;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
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
        View::composer('*', function ($view) {
            $view['carts']= Cart::count();
            $view['cart']=Cart::content();
        //     $wishlist = Session::get('wishlist');
        //     if($wishlist != NULL){
        //     $data['wishlist'] =DB::table('products')
        //     ->whereIn('id',$wishlist)       
        //     ->get(); 
           
        //    $view['count']= count($data['wishlist']);
        // }else{
        //     $view['count'] = 0;
        // };
           
            if(Auth::user()== NULL){
                $view['count']= 0;
            }else{
                $data['test']=DB::table('wishlist')
                ->join('products','wishlist.id','=','products.id')
                ->where('id_users',Auth::user()->uuid)
                ->get();
                $view['count']=count( $data['test']);
            };


    

        // dd($view['count']);
        });
    }
}
