<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\ProductRequest;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use  Illuminate\Http\Request;

use App\Models\File;
use App\Model\Gallery;

use Illuminate\Support\Facades\File as File2; 
class ProductController extends BaseController
{
    public function __construct()
    {
        parent::__construct('products');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   
         $data['categories'] = DB::table('categories')->where('status',1)->get();

         $data['products'] = DB::table('categories')
         ->join('products','categories.id','=','products.category_id')->get();
        
        $data['images']= DB::table('products')
        ->join('files','products.id','=','files.product_id')
        ->get();
        // dd($data);
        return $this->view_admin('index', $data);
    }
    public function unactive_products($id){

        DB::table('products')->where('id',$id)->update(['status_product'=>1]);
  
        return $this->route_admin('index', [] ,['success' => 'Kích hoạt sản phẩm thành công']);
    }
    public function active_products($id){

        DB::table('products')->where('id',$id)->update(['status_product'=>0]);
    
        return $this->route_admin('index', [] ,['success' => 'Tắt kích hoạt sản phẩm thành công']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['categories'] = DB::table('categories')->where('status',1)->get();
        
  

        return $this->view_admin('create', $data) ;
    }
    public function create_new(){
        $data['categories'] = DB::table('categories')->where('status',1)->get();
        
       

        return $this->view_admin('create_new', $data) ;
    }
        // view($this->view . '.create')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       
        $data = $request->except('_token','countdown');

        $data['created_at'] = new \DateTime();

        $imageName = time().'-'.$request->images->getClientOriginalName();

        $request->images->move(public_path('images/products'), $imageName);
        
        $data['images'] = $imageName;
        
        $data['user_id'] = 1;
        $data['old_price']=0;
        $data['uuid'] = Str::uuid();

    
      
        $this->db->insert($data);

        return $this->route_admin('index', [] ,['success' => 'Thêm sản phẩm thành công']);
    }
    public function store_new(ProductRequest $request)
    {
       
        $data = $request->except('_token');

        $data['created_at'] = new \DateTime();

        $imageName = time().'-'.$request->images->getClientOriginalName();

        $request->images->move(public_path('images/products'), $imageName);
        
        $data['images'] = $imageName;

        $data['user_id'] = 1;
        $data['old_price']=0;
        $data['uuid'] = Str::uuid();

    
      
        $this->db->insert($data);

        return $this->route_admin('index', [] ,['success' => 'Thêm sản phẩm thành công']);
    }
    public function store_images(Request $request){

            
        
                $this->validate($request, [
                    'filenames' => 'required',
                    'filenames.*' => 'required'
            ]);

            $files = [];
            if($request->hasfile('filenames'))
            {
                foreach($request->file('filenames') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('files'), $name);  
                    $files[] = $name;  
                }
            } 
    
            $file= new File();
            $file->filenames = $files;
            $file->product_name = $request->product_name;
            $file->product_id = $request->product_id;
            
            $file->save();
            
            return $this->route_admin('index', [] ,['success' => 'Thêm hình ảnh sản phẩm thành công']);
    }
    public function imagesEdit($id){
        $user = $this->db->where('uuid', $id);

      

        $files['user']=$user->first();

        
        $files['products'] = DB::table('products')->where('uuid',$id)->first();
          

        $files['files_product'] = DB::table('products')
        ->join('files','products.id','=','files.product_id')
        ->where('uuid',$id)
        ->get();
        $files['files_images'] = DB::table('products')
        ->join('files','products.id','=','files.product_id')
        ->where('uuid',$id)
        ->get('filenames');
   
        $uuid=$files['files_product']->pluck('id')->toArray();
        
        $files['products'] = File::find($uuid);

        $files['product_images']= explode(',',$files['files_images']);

        $files['images_new1'] = str_replace('\"','', $files['product_images'] );
        $files['images_new2'] = str_replace('[{"filenames":"[','', $files['images_new1'] );
         $files['images_new3'] = str_replace(']"}]','', $files['images_new2'] );
            // dd($files);
            
        return view('admin.modules.products.imagesEdit', $files);
    }
    public function updateEdit(Request $request)
    {
    	$input = $request->all();
        $files = [];
        $files_remove = [];
        if($request->hasfile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('files'), $name);  
			    $files[] = $name;  
			}
		}

		if (isset($input['images_uploaded'])) {
			$files_remove = array_diff(json_decode($input['images_uploaded_origin']), $input['images_uploaded']);
			$files = array_merge($input['images_uploaded'], $files);
		} else {
			$files_remove = json_decode($input['images_uploaded_origin']);
		}
  
        $file = File::find($input['id']);
		$file->filenames = $files;
		if($file->update()) {
			foreach ($files_remove as $file_name) {
				File2::delete(public_path("files/".$file_name));
			}
		}
 
        return back()->with('success', 'Data Your files has been successfully updated');
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
    public function images($id){
            $data['products'] = DB::table('products')->where('uuid',$id)->get();
           
          return view('admin.modules.products.images',$data);
    }

    public function add_gallery($id){
        $pro_id =$id;

        return view('admin.modules.gallery.gallery')->with(compact('pro_id'));
    }
    public function select_gallery(Request $request){
        $product_id = $request->pro_id;

        $gallery =Gallery::where('product_id',$product_id)->get();

        $gallery_count = $gallery->count();

        $output =' <table class="table table-hover">
        <thead>
            <tr>
                <th>Thu tu</th>
                <th>Ten hinh anh</th>
                <th>Hinh anh </th>
                <th>Quan ly</th>
            </tr>
        </thead>
        <tbody>';

        if($gallery_count>0){
            $i =0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                <tr>
                            <td>'.$i.'</td>
                            <td>'.$gal->gallery_name.'</td>
                            <td>'.$gal->gallery_image.'</td>
                            <td>
                            <button data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs bth-danger delete-gallery>Xoa</button>  </td>
                            </tr>
                            ';

            }

        }else{
            $output.=' <tr>
            <td colspan="4"> San pham chua co thu vien anh </td>
            
        </tr>';
        }
        echo $output;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->db->where('uuid', $id);
         

        
      
        // $id =(string) Str::uuid();

        if ($product->exists()) {
            $data['product'] = $product->first();
            $data['categories'] = DB::table('categories')->get();
          
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
    public function update(ProductRequest $request, $id)
    {
       
        $product_current = $this->db->where('id', $id)->first();
    
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();
      

        if (empty($request->images)) {
            $data['images'] = $product_current->images; 
        } else {
            $image_path = public_path('images/products') . "/" . $product_current->images;
            // if (file_exists($image_path)) {
            //     unlink($image_path);
            // }

            $imageName = time().'-'.$request->images->getClientOriginalName();  
            $request->images->move(public_path('images/products'), $imageName);
            $data['images'] = $imageName;
        }

        $data['user_id'] = 1;
 
        // dd($data);
        DB::table('products')->where('id',$id)->update($data);
        // $this->db->where('uuid', $id)->update($data);

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
        $product = $this->db->where('uuid', $id);

        $id = $product->pluck('id')->toArray();
        $file = DB::table('files')->where('product_id',$id);

  
        if ($product->exists()) {
            $product_current = $product->first();

            if (!empty($product_current->avatar)) {
                $image_path = public_path('images') . "/" . $product_current->images;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $product->delete();
            $file->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa sản phẩm thành công']);
        } else {
            abort(404);
        }
    } 

   
    
}
