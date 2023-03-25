<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends BaseController
{   
    public function __construct()
    {
        parent::__construct('categories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   
         $data['categories'] = $this->db->get();
        
        //  dd($data);
        return $this->view_admin('index', $data);
    }
    public function unactive_categories($id){

        DB::table('categories')->where('id',$id)->update(['status'=>1]);
  
        return $this->route_admin('index', [] ,['success' => 'Kích hoạt sản phẩm thành công']);
    }
    public function active_categories($id){

        DB::table('categories')->where('id',$id)->update(['status'=>0]);
    
        return $this->route_admin('index', [] ,['success' => 'Tắt kích hoạt sản phẩm thành công']);
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
        // view($this->view . '.create')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');

        

        $data['created_at'] = new \DateTime(); 

        $this->db->insert($data);

        return $this->route_admin('index' , [] ,  ['success' => 'Thêm nhãn hàng thành công']);
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
        
         

        $category = $this->db->where('id', $id);

        // $id =(string) Str::uuid();

        if ($category->exists()) {
            $data['category'] = $category->first();


            // dd($data['category']);
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
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

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
        $category = $this->db->where('id', $id);

        if ($category->exists()) {
            $category->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa thể loại thành công']);
        } else {
            abort(404);
        }
    } 
}
