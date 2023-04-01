<?php

namespace App\Http\Controllers\Website;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
public function category($id){
    $sql_category =DB::table('categories')->where('parent_id',2)->limit(8);

    $data['category_name'] =DB::table('categories')->where('name_cate', $id)->first();
    $data['categories_featured'] = $sql_category->get(); 

    $cate =DB::table('categories')->where('name_cate', $id);
    $id_cate = $cate->pluck('id')->toArray();
    
    $category_id_featured = $sql_category->pluck('id')->toArray();
    
    
    $data['category_list']= $this->category_product($id_cate);

    $data['products_random1'] = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->select('products.*','categories.name_cate')
    ->where('status_product',1)
    ->whereIn('category_id',$category_id_featured)
    ->inRandomOrder()
    ->limit(4)
    ->get();
            
    return view('website.modules.product.category',$data);
}
public function detail($id,$uuid){
       
        
        $product = DB::table('products')->where('uuid',$uuid)->get();

 
        $id_product = $product->pluck('id')->toArray();

        $uuid_product = $product->pluck('uuid')->toArray();
        
        $data['product'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate','categories.id as cateid')
        ->where('products.id',$id_product)
        ->first();

        $name = DB::table('products')->where('id',$id_product);
        $uuid = $name->pluck('uuid')->toArray();

        $data['images'] = DB::table('files')
        ->where('product_id',$id_product)
        ->get();
        $v = DB::table('files')
        ->where('product_id',$id_product)          
        ->get('filenames');
        
        $data['product_images']= explode(',',$v);

        $data['images_new1'] = str_replace('\"','', $data['product_images'] );
        $data['images_new2'] = str_replace('[{"filenames":"[','', $data['images_new1'] );
        $data['images_new3'] = str_replace(']"}]','', $data['images_new2'] );
        
    
        $category_id_of_project = $data['product']->cateid;

    

        $data['product_related'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->where('status_product',1)
        ->where([
            ['category_id', $category_id_of_project],
            ['products.id', '!=' , $uuid]
        ])
        ->inRandomOrder()
        ->limit(9)
        ->get();
     
        $data['comments'] = DB::table('comments')
        ->select('comments.*','users.fullname','users.avatar')
        ->join('users','comments.user_id_comments','=','users.uuid')
        ->join('products','comments.post_id_comments','=','products.uuid')
        ->where('post_id_comments',$uuid)
        ->where('status_comments',1)
        ->get();



        $data['rating']=DB::table('rating')->where('id_post',$uuid_product)->get();
        $rating_sum=DB::table('rating')->where('id_post',$uuid_product)->sum('rating');
        // dd($data);
        if($data['rating']->count() >0 )
        {
            $data['rating_value']= $rating_sum/ $data['rating']->count();
        }else{
            $data['rating_value']=0;
        }
       
        
    return view('website.modules.product.detail',$data);
}

public function product($id){
    $name_product =  DB::table('categories')->where('name_cate',$id)->get();

    $id_product= $name_product->pluck('id')->toArray();
    

    $sql_category =DB::table('categories')->where('parent_id',$id_product)->limit(8);
    $data['category_name'] =DB::table('categories')->where('id', $id_product)->first();
    
    $data['categories_featured'] = $sql_category->get(); 
    
    $category_id_featured = $sql_category->pluck('id')->toArray();

    $data['products_random'] = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->select('products.*','categories.name_cate')
    ->whereIn('category_id',$category_id_featured)
    ->where('status_product',1)
    ->inRandomOrder()
    ->limit(16)
    ->get();

    $sql_category1 =DB::table('categories')->where('parent_id',3)->limit(8);
    $data['categories_featured1'] = $sql_category1->get(); 
    
    $category_id_featured1 = $sql_category1->pluck('id')->toArray();

    $data['products_random1'] = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->select('products.*','categories.name_cate')
    ->whereIn('category_id',$category_id_featured1)
    ->where('status_product',1)
    ->inRandomOrder()
    ->limit(16)
    ->get();
        
    return view('website.modules.product.product',$data);
}


public function category_product ($category_id, $skip = null, $limit = null)
{
    $sql = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_cate as catename')
        ->where('category_id', $category_id )
        ->orderBy('price','DESC')
        ;

    if (!is_null($skip) && !is_null($limit)) {
        $sql->skip($skip)->limit($limit);
    }
        
    return $sql->get();
}
public function price($id){

    $sql_sidebar = DB::table('categories')
    ->where('name_cate', $id)->get();
    
    $id_name_cate = $sql_sidebar->pluck('id')->toArray();
    
    $sql_category = DB::table('categories')
    ->where('parent_id', $id_name_cate)
    ->limit(8);

    $data['categories_featured'] = $sql_category->get();

    $category_id_featured = $sql_category->pluck('id')->toArray();

    $data['product_price'] = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->select('products.*', 'categories.name_cate as catename')
    ->whereIn('category_id', $category_id_featured)
    ->where('status_product',1)
    ->where('price','<','5000000')
    ->orderBy('price','DESC')
    ->inRandomOrder()          
    ->get();

    $data['products_random1'] = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->select('products.*','categories.name_cate')
    ->whereIn('category_id',$category_id_featured)
    ->where('status_product',1)
    ->inRandomOrder()
    ->limit(4)
    ->get();
            
        
// $data['product_price'] =DB::select('SELECT * FROM `products` WHERE price <= 5000000 ORDER BY price ASC');

    return view('website.modules.price.price5tr',$data);
}
public function price10tr($id){
    $sql_sidebar = DB::table('categories')
    ->where('name_cate', $id)->get();
    
    $id_name_cate = $sql_sidebar->pluck('id')->toArray();

    $sql_category = DB::table('categories')
    ->where('parent_id', $id_name_cate)
    ->limit(8);

    $data['categories_featured'] = $sql_category->get();

    $category_id_featured = $sql_category->pluck('id')->toArray();

    $data['product_price'] = DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->select('products.*', 'categories.name_cate as catename')
    ->whereIn('category_id', $category_id_featured)
    ->where('status_product',1)
    ->where('price','<','15000000')
    ->where('price','>','5000000')
    ->orderBy('price','DESC')
    ->inRandomOrder()         
    ->get();

    $data['products_random1'] = DB::table('products')
    ->join('categories','products.category_id','=','categories.id')
    ->select('products.*','categories.name_cate')
    ->whereIn('category_id',$category_id_featured)
    ->where('status_product',1)
    ->inRandomOrder()
    ->limit(4)
    ->get();

    return view('website.modules.price.price10tr',$data);
}
public function price20tr($id){
        $sql_sidebar = DB::table('categories')
        ->where('name_cate', $id)->get();
        
        $id_name_cate = $sql_sidebar->pluck('id')->toArray();

        $sql_category = DB::table('categories')
        ->where('parent_id',  $id_name_cate)
        ->limit(8);

        $data['categories_featured'] = $sql_category->get();

        $category_id_featured = $sql_category->pluck('id')->toArray();

        $data['product_price'] = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_cate as catename')
        ->whereIn('category_id', $category_id_featured)
        ->where('status_product',1)
        ->where('price','<','25000000')
        ->where('price','>','15000000')
        ->orderBy('price','DESC')
        ->inRandomOrder()          
        ->get();

        $data['products_random1'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->whereIn('category_id',$category_id_featured)
        ->where('status_product',1)
        ->inRandomOrder()
        ->limit(4)
        ->get();

    return view('website.modules.price.price20tr',$data);
}
public function price25tr($id){
        $sql_sidebar = DB::table('categories')
        ->where('name_cate', $id)->get();
        
        $id_name_cate = $sql_sidebar->pluck('id')->toArray();

        $sql_category = DB::table('categories')
        ->where('parent_id',  $id_name_cate)
        ->limit(8);

        $data['categories_featured'] = $sql_category->get();

        $category_id_featured = $sql_category->pluck('id')->toArray();

        $data['product_price'] = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_cate as catename')
        ->whereIn('category_id', $category_id_featured)
        ->where('status_product',1)
        ->where('price','>','23000000')
        ->orderBy('price','DESC')
        ->inRandomOrder()          
        ->get();

        $data['products_random1'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->whereIn('category_id',$category_id_featured)
        ->where('status_product',1)
        ->inRandomOrder()
        ->limit(4)
        ->get();
  
    return view('website.modules.price.price25tr',$data);
}

public function product_countdown($id){
        $data['product'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate','categories.id as cateid')
        ->where('products.id',$id)
        ->first();

        $category_id_of_project = $data['product']->cateid;

        $data['product_related'] = DB::table('products')
        ->join('categories','products.category_id','=','categories.id')
        ->select('products.*','categories.name_cate')
        ->where('status_product',1)
        ->where([
            ['category_id', $category_id_of_project],
            ['products.id', '!=' , $id]
        ])
        ->inRandomOrder()
        ->limit(9)
        ->get();

        $data['images'] = DB::table('files')
        ->where('product_id',$id)
        ->get();
            $v = DB::table('files')
            ->where('product_id',$id)          
            ->get('filenames');

    
        $data['product_images']= explode(',',$v);

        $data['images_new1'] = str_replace('\"','', $data['product_images'] );
        $data['images_new2'] = str_replace('[{"filenames":"[','', $data['images_new1'] );
        $data['images_new3'] = str_replace(']"}]','', $data['images_new2'] );

        $name = DB::table('products')->where('id',$id);
        $uuid = $name->pluck('uuid')->toArray();
        $data['comments'] = DB::table('comments')
        ->select('comments.*','users.fullname','users.avatar')
        ->join('users','comments.user_id_comments','=','users.uuid')
        ->join('products','comments.post_id_comments','=','products.uuid')
        ->where('post_id_comments',$uuid)
        ->where('status_comments',1)
        ->get();
       
        $data['rating']=DB::table('rating')->where('id_post',$uuid)->get();
        $rating_sum=DB::table('rating')->where('id_post',$uuid)->sum('rating');
        // dd($data);
        if($data['rating']->count() >0 )
        {
            $data['rating_value']= $rating_sum/ $data['rating']->count();
        }else{
            $data['rating_value']=0;
        }
          

    return view('website.modules.product.product_countdown',$data);
}


}
?>