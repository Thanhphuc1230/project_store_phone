<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\WishlistRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;
use Carbon\Carbon;
class CartController extends Controller
{
    public function cart($id){
     
        // Cart::instance('wishlist')->store('username');
        // if(Cart::count()== 0){
        //     return redirect()->route('website.index');
        // }
        $data['carts']= Cart::count();
        // $data['cart']=Cart::content();
         $data['store'] =DB::table('users')->where('uuid',$id)->first();  
            // Cart::store($data['store']->fullname);
            // dd($data);
           
        
            return view('website.modules.cart.cart',$data);
       
       
    }

    public function check(){
        $mess ='nếu chưa có tài khoản vui lòng click vào đây để  <a href="'.route('getRegister').'" style="color: blue">Đăng ký</a>';
        $login = ' <a href="'.route('getLogin').'" style="color: blue">Đăng nhập </a>';
        return back()->with('error', 'Vui lòng'  .$login .'để sử dụng chức năng '.  $mess);
    }
    public function addToCart($id,$quantity = 1 ){
        

        $products =DB::table('products')->where('id',$id)->first();  

     
            if(Auth::user() == NULL){
                 Cart::add(['id' => $products->id, 'name' => $products->name, 'qty' => $quantity, 'price' => $products->price,
                'weight' => 0, 'options' => ['images' => $products->images]]);
            }else{
                $addProduct =  Cart::add(['id' => $products->id, 'name' => $products->name, 'qty' => $quantity, 'price' => $products->price,
                'weight' => 0, 'options' => ['images' => $products->images]]);
                $data =array();
                $data=[
                    'user_id'=> Auth::user()->uuid,
                    'name_product'=>$addProduct->name,
                    'quantity' =>$addProduct->qty,
                    'images'=>$addProduct->options->images,
                    'price'=>$addProduct->price
                ];            
                DB::table('cart')->insert($data);
            }
           
        
       
         
       
            return back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng thành công');
    }

    public function updateCart(Request $request){
        
        foreach($request->quantity as $key => $quantity){
            Cart::update($key, $quantity); 
        }
     

        return back()->with('success', 'Cập nhật giỏ hàng thành công');
      
    }
    public function removeItemCart ($rowId) {
        Cart::remove($rowId);

        return back()->with('success', 'Xóa sản phẩm trong giỏ hàng thành công');
    }

 


    public function addToWishList (WishlistRequest $request, $id) {
       if(Auth::user() == Null){
        $mess ='nếu chưa có tài khoản vui lòng click vào đây để  <a href="'.route('getRegister').'" style="color: blue">Đăng ký</a>';
        $login = ' <a href="'.route('getLogin').'" style="color: blue">Đăng nhập </a>';
        return back()->with('error', 'Vui lòng'  .$login .'để sử dụng chức năng '.  $mess);
       }else{



        $products =DB::table('products')->where('id',$id)->first();  

        $order= DB::table('users')->where('uuid',Auth::user()->uuid)->first();

        $products1 =DB::table('wishlist')->where('id_users',Auth::user()->uuid)->where('product_id',$id)->count()
        ;
        
        
        $wishlist = DB::table('top_wishlist')->where('id_product', $id)->count();
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
       if( $products1 == 0){
        $data =array();
            $data = [
                'likes'=>  1,
                'id_users'=> $order->uuid,
                'product_name' =>  $products->name,
                'images_product'=> $products->images,   
                'price_product'=>$products->price,
                'product_id' => $products->id,
                'created_at' => $time ,
            ];
     
          DB::table('wishlist')->insert($data);
       }else{
        return back()->with('error', 'Sản phẩm đã được thêm vào danh sách yêu thích rồi');
       }
            
          if($wishlist == 0 ){             
                $wishlist_top =array();
                $wishlist_top=[
                  'name_product'=>$products->name,
                  'id_product'=>$products->id,
                  'likes_top'=> 1,
                  'created_at' => $time,
                ];
               $wish =   DB::table('top_wishlist')->insert($wishlist_top);
          
        }else{
            $products =DB::table('products')->where('id',$id)->first();  
            DB::table('top_wishlist')
          ->where('id_product', $id)
        //   ->update(['likes_top'=> DB::raw('likes_top +  1')])
        //   ->update(['updated_at'=> DB::raw('updated_at + Carbon::today()'  )])
          ;
  
          
        };
    }

        
       
        return back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích thành công');
    //    }
       
        
  
        // if (Session::has('wishlist')) {
        //     $wishlist   = Session::get('wishlist');

        //     if (!in_array($id, $wishlist)) {
        //         $wishlist[] = $id;
        //         Session::put('wishlist', $wishlist);
        //     }
            
        //     $wishlist = Session::get('wishlist');
        // } else {
        //     Session::put('wishlist', [$id]);
        // }
       
    
    }
    public function addToWishListNew( $id){
        $products =DB::table('products')->where('id',$id)->first();  
             DB::table('top_wishlist')
           ->where('name_product',$products->name)
           ->update(['likes_top'=> DB::raw('likes_top +  1')])
           ;
           return back()->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích thành công');
    }

    public function wishlist(){

       

       $data['test']=DB::table('wishlist')
       ->where('id_users',Auth::user()->uuid)
       ->get();

    //     $data['count']=DB::table('wishlist')
    //    ->where('product_name','iPhone 14 Pro')
    //    ->count();
    //    dd($data);
        $count=count( $data['test']);
       if(  $count == 0){
        return back()->with('error', 'Chưa có sản phẩm yêu thích nào');
       }else{
        return view('website.modules.cart.wishlist',$data);
       }
      
     
        
        // }
        
        
    }
    public function removeWishList (Request $request,$id) {

       
        $data['deleteWishList'] =DB::table('wishlist')
    
        ->where('id',$id);
        
        
        $deleteTopWishList =  $data['deleteWishList']->pluck('product_name')->toArray();
     
        $top_wishlist['deleteTopWishlists']=DB::table('top_wishlist')->where('name_product',$deleteTopWishList)
        ->update(['likes_top'=> DB::raw('likes_top -  1')])
        ;
     

        
        $data['deleteWishList']->delete();
        

         return back()->with('success', 'Xóa mục yêu thích thành công');
    }

    public function checkout($id){
         $count=Cart::count();


         if( $count == 0){
            return back()->with('error', 'Không có sản phẩm nào trong giỏ hàng để thanh toán ');
         }{
            $data['user'] = DB::table('users')->where('uuid',$id)->first();

            return view('website.modules.cart.checkout',$data);
         }
     
    }

    public function store(OrderRequest $request,$id){
        //insert users
        $time = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $data =array();
        $data = [
            'fullname_order'=> $request->fullname_order,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,           
            
        ];
        $data['created_at'] =  $time;
       
        $order['user'] = DB::table('users')->where('uuid',$id)->first();

       $order_shipping = DB::table('order_shipping')->insertGetId($data);

       $order_status =[
        'user_id'   => $order['user']->id,
        'shipping_id' => $order_shipping,           
        'payment' => $request->payment,
        'order_total'=>Cart::total(),
        'order_status' =>'0',
    ];
    $order_status['created_at'] =  $time;

     $product_status = DB::table('order_status')->insertGetId($order_status);
    
        $content = Cart::content();

        foreach($content as $product_content){
            
            $v_data['order_status'] = $order_shipping;
            $v_data['product_id'] = $product_content->id;
            $v_data['product_name'] = $product_content->name;
            $v_data['product_price'] = $product_content->price;
            $v_data['product_sales_quantity'] = $product_content->qty;
            $v_data['created_at'] =  $time;
         $shipping_status = DB::table('order_product')->insertGetId($v_data);
           
        }
        $dt = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $total = Cart::total();
        // dd($total);
        $totalFloat = str_replace(',','', $total  );

        $TimeTurnover = DB::table('turnover')->where('order_date',$dt)->count();

        if($TimeTurnover == 0){
                
        $turnover =[
            'order_date' => Date('Y-m-d'),
            'sales' => $totalFloat,
            'quantity' => Cart::count(),
            'total_order' => 1,
            'created_at' => $time,

        ];
            DB::table('turnover')->insert($turnover);
        }else{
            $turnovers['updateTurnovers']=DB::table('turnover')->where('order_date',$dt)
            
            ->update(['sales'=> DB::raw('sales' .'+' .$totalFloat) ]);
            $turnovers['updateTurnovers']=DB::table('turnover')->where('order_date',$dt)
            ->update(['quantity'=> DB::raw('quantity'. '+'. Cart::count() )]);
            $turnovers['updateTurnovers']=DB::table('turnover')->where('order_date',$dt)
            ->update(['total_order'=> DB::raw('total_order +  1')]);

        }

      

       
        

      
      
       
       
      

        return redirect()->route('website.order_place',$order['user']->uuid);
    }

    public function order_place($id){
        $data['user'] = DB::table('users')->where('uuid',$id)->first();

    
        Cart::destroy();
        return view('website.modules.cart.order_place',$data);
    }
}
