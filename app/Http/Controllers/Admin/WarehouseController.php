<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\WarehouseRequest;
use  Illuminate\Http\Request;
use Illuminate\Support\Str;

class WarehouseController extends BaseController
{
    public function __construct()
    {
        parent::__construct('warehouses');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        // $data["warehouses"] = DB::table('products')
        
        // ->join('warehouses','products.id','=','warehouses.product_id')->get();
        
        $data["warehouses"] = DB::select('SELECT w.*,p.* ,(w.uuid)AS Wuuid, (w.import - w.export) AS Sum FROM products as p, warehouses as w WHERE p.id = w.product_id');
        
        
        
    
// cột warehouses nối với cột products bằng cách nối cột warehouses với cột product_id (lấy hết)
       
        return $this->view_admin('index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['products'] = DB::table('products')->get();

        return $this->view_admin('create', $data) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRequest $request)
    {
        $data = $request->except('_token');

        $data['created_at'] = new \DateTime();

        $data['uuid'] = Str::uuid();
        
        

        $this->db->insert($data);

        return $this->route_admin('index', [] ,['success' => 'Thêm sản phẩm thành công']);
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
        $warehouse = $this->db->where('uuid', $id);
         
    
        

        // $id =(string) Str::uuid();

        if ($warehouse->exists()) {
            $data['warehouse'] = $warehouse->first();
            $data['products'] = DB::table('products')->get();
            // dd($data['category']);
            // dd($data);
            return $this->view_admin('edit', $data);
        } else {
            abort(404);
        }
        
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
        $product_current = $this->db->where('uuid', $id)->first();

        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();


        

   
            
        

 

        $this->db->where('uuid', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa sản phẩm thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = $this->db->where('id', $id);

        if ($warehouse->exists()) {
            $warehouse->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa thể loại thành công']);
        } else {
            abort(404);
        }
    }
}
