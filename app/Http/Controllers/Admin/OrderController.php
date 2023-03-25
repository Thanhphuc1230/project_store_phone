<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends BaseController
{
    public function __construct()
    {
        parent::__construct('orders');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   
        

         $data["order_status"] = DB::table('order_shipping')
         ->join('order_status','order_shipping.id','=','order_status.shipping_id')->get();

     
            
        return $this->view_admin('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return $this->view_admin('create') ;
    }
    public function unactive_orders($id){

        DB::table('order_status')->where('shipping_id',$id)->update(['order_status'=>1]);
  
        return $this->route_admin('index', [] ,['success' => 'Đã giao sản phẩm thành công']);
    }
    public function active_orders($id){

        DB::table('order_status')->where('shipping_id',$id)->update(['order_status'=>0]);
    
        return $this->route_admin('index', [] ,['success' => 'Sản phẩm chưa được xử lý ']);
    }
        // view($this->view . '.create')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime(); 

        $data['uuid'] = Str::uuid();


        $imageName = time().'-'.$request->avatar->getClientOriginalName();  
        $request->avatar->move(public_path('images/news'), $imageName);
        $data['avatar'] = $imageName;

        $this->db->insert($data);
        

        return $this->route_admin('index' , [] ,  ['success' => 'Thêm bài viết thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = DB::table('order_status')->where('id', $id)->get();
        // $data["products"] = DB::table('categories')
        // ->join('products','categories.id','=','products.category_id')->get();
        $data['user'] = DB::table('order_status')->where('order_id',$id)->get();

        $user = DB::table('order_status')->where('id',$id);
        
        $data['order_user'] = DB::table('users')
        ->join('order_status','users.id', '=','order_status.user_id')
        ->where('shipping_id',$id)
        ->get();
        
        $data['order_shipping'] = DB::table('order_shipping')
        ->join('order_status','order_shipping.id', '=','order_status.shipping_id')
        ->where('id',$id)
        ->get();
   

  
       
        $data['order_product'] = DB::table('order_product')
        ->where('order_status',$id)
        ->get();



   

       
        return view('admin.modules.orders.edit',$data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_current = $this->db->where('id', $id)->first();

        
        $data = $request->except('_token');

        $data['updated_at'] = new \DateTime();

        if (empty($request->avatar)) {
            $data['avatar'] = $new_current->avatar; 
            
        } else {
            $image_path = public_path('images/news') . "/" . $new_current->avatar;

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->avatar->getClientOriginalName();  
            $request->avatar->move(public_path('images/news'), $imageName);
            $data['avatar'] = $imageName;
      
        }
        
        $this->db->where('id', $id)->update($data);
        
        return $this->route_admin('index', [] ,['success' => 'Sửa nhãn hàng thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status= DB::table('order_status')->where('shipping_id', $id);
        $product =DB::table('order_product')->where('order_status',$id);
        $data =DB::table('order_shipping')->where('id',$id);  
       
            $data->delete();
            $status->delete();
            $product->delete();

            return $this->route_admin('index', [] ,['success' => 'Xóa thành viên thành công']);
       
      
    } 
}
