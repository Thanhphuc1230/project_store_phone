<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use Session;
class SearchController extends Controller
{
    public function search(Request $request){
    
            $search_text =$request->search;               

            Session::put('key', $search_text);
        
            return redirect()->route('website.searchNow');
            // return view('website.modules.search.search',$data,);
          
    }
    public function searchNow(Request $request){
        $sql_category = DB::table('categories')
        ->where('parent_id', 2)
        ->where('status',1)
        ->limit(8);

        $data['categories_featured'] = $sql_category->get();

        $category_id_featured = $sql_category->pluck('id')->toArray();

        $data['products_random1'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->whereIn('category_id',$category_id_featured)
        ->where('status_product',1)
        ->inRandomOrder()
        ->limit(4)
        ->get();
        $search_text = Session::get('key');
        $data['key'] = $search_text = Session::get('key');
        $title = DB::table('products')
        ->select('products.*','categories.name_cate')
        ->join('categories','products.category_id','=','categories.id')
        ->where('name','like','%' . $search_text . '%')
        ->where('status_product',1)
        ->get();

        return view('website.modules.search.search',$data,['name'=>$title]);
    }
   
    public function ajaxSearch(Request $request){
        $key = $request->input('key');
        $data = DB::table('products')->where('name', 'LIKE', '%'.$key.'%')
                           ->get();

        return $data;
    }

}
