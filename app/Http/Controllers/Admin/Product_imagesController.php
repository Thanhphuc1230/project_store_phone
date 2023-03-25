<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\File;

use Illuminate\Support\Facades\File as File2; 
class Product_imagesController extends BaseController
{
    public function __construct()
    {
        parent::__construct('products_images');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   
   
        $data["product_images"] = DB::table('products')
        ->join('products_images','products.id','=','products_images.product_id')->get();
 
     
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
        $files = File::all();
        // return view('create', ['images' => $files]);
        
       

        return $this->view_admin('create',$data, ['files' => $files]) ;
    }
   
        // view($this->view . '.create')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       
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
            $file->save();

            return back()->with('success', 'Data Your files has been successfully added');
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
        $product = $this->db->where('uuid', $id);
         
      

        // $id =(string) Str::uuid();

        if ($product->exists()) {
            $data['products'] = $product->first();
            $data['categories'] = DB::table('products')->get();
       
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


        if (empty($request->images)) {
            $data['images'] = $product_current->images; 
        } else {
            $image_path = public_path('images/products') . "/" . $product_current->images;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->images->getClientOriginalName();  
            $request->images->move(public_path('images/products'), $imageName);
            $data['images'] = $imageName;
        }

 

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
        $product = $this->db->where('uuid', $id);

        if ($product->exists()) {
            $product_current = $product->first();

            if (!empty($product_current->avatar)) {
                $image_path = public_path('images') . "/" . $product_current->images;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $product->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa sản phẩm thành công']);
        } else {
            abort(404);
        }
    } 
}