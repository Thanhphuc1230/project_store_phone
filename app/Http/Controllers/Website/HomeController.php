<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**$data = DB::table('users')->get();
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $data['wishlist'] = DB::table('top_wishlist')->get();
       
        $sql_category =DB::table('categories')->where('parent_id',2)->where('status',1)->limit(5);
        $sql_category3 =DB::table('categories');
        $sql_category1 =DB::table('categories')->where('parent_id',3)->where('status',1)->limit(8);
        $sql_category2 =DB::table('categories')->where('parent_id',5)->where('status',1)->limit(8);

       $data['categories_featured'] = $sql_category->get(); 
       $data['categories_featured1'] = $sql_category1->get(); 
       $data['categories_featured2'] = $sql_category2->get(); 
       $data['categories_featured3'] = $sql_category3->get(); 

       $category_id_featured = $sql_category->pluck('id')->toArray();
       $category_id_featured1 = $sql_category1->pluck('id')->toArray();
       $category_id_featured2 = $sql_category2->pluck('id')->toArray();
       $category_id_featured3 = $sql_category3->pluck('id')->toArray();

        //Featured Products
       $data['products_random'] = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('rating', 'products.uuid', '=', 'rating.id_post')
        ->select('products.*', 'categories.name_cate', 'rating.rating', DB::raw('(SELECT SUM(rating)/COUNT(DISTINCT user_id) FROM rating WHERE id_post = products.uuid) as average_rating'))
        ->where('status_product', 1)
        ->whereIn('category_id', $category_id_featured)
        ->inRandomOrder()
        ->limit(8)
        ->get();

       $data['products_random1'] = DB::table('products')
       ->join('categories', 'products.category_id', '=', 'categories.id')
       ->leftJoin('rating', 'products.uuid', '=', 'rating.id_post')
       ->select('products.*', 'categories.name_cate', 'rating.rating', DB::raw('(SELECT SUM(rating)/COUNT(DISTINCT user_id) FROM rating WHERE id_post = products.uuid) as average_rating'))
       ->where('status_product', 1)
       ->whereIn('category_id', $category_id_featured)
       ->inRandomOrder()
       ->limit(8)
       ->get();

       // Best Selling Products
       $data['products_random2'] = DB::table('products')
       ->join('categories','products.category_id','=','categories.id')
       ->select('products.*','categories.name_cate')
       ->where('status_product',1)
       ->whereIn('category_id',$category_id_featured1)
       ->inRandomOrder()
       ->limit(6)
       ->get();


       $data['products_random3'] = DB::table('products')
       ->join('categories','products.category_id','=','categories.id')
       ->select('products.*','categories.name_cate')
       ->where('status_product',1)
       ->whereIn('category_id',$category_id_featured1)
       ->inRandomOrder()
       ->limit(6)
       ->get();

       //New Arrivals
       $data['products_random4'] = DB::table('products')
       ->join('categories','products.category_id','=','categories.id')
       ->select('products.*','categories.name_cate')
       ->where('status_product',1)
       ->whereIn('category_id',$category_id_featured2)
       ->inRandomOrder()
       ->limit(6)
       ->get();
        //Product_countdown
        $data['products_random5'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->where('countdown','Is Not',NULL)
        ->where('status_product',1)
        ->whereIn('category_id',$category_id_featured3)
        ->limit(5)
        ->get();
  

        $data_category_lasted = DB::table('categories')
            ->where('parent_id',2)
            ->whereNotIn('id',$category_id_featured)
            ->limit(3)
            ->get();
       
        $category_lasted=[];
        
        foreach ($data_category_lasted as $category_item) {            
            $category_lasted[$category_item->name_cate][] = $this->category_product($category_item->id, 0, 3);
            $category_lasted[$category_item->name_cate][] = $this->category_product($category_item->id, 3, 3);
        }

        $data["category_lasted"] = $category_lasted; 
        $data['sliders']= DB::table('sliders')->where('status',1)->get();

        return view('website.modules.home.index',$data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function category_product ($category_id, $skip = null, $limit = null)
    {
        $sql = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name_cate as catename')
            ->where('category_id', $category_id);

        if (!is_null($skip) && !is_null($limit)) {
            $sql->skip($skip)->limit($limit);
        }
            
        return $sql->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
