<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SliderController extends BaseController
{
    public function __construct()
    {
        parent::__construct('sliders');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {      
         $data['sliders'] = $this->db->get();

        // $users= User::search(request(key:'search'))->paginate(5);
        


        return $this->view_admin('index',$data);
    }

    public function unactive_sliders($id){

            DB::table('sliders')->where('id',$id)->update(['status'=>1]);
      
            return $this->route_admin('index', [] ,['success' => 'Kích hoạt sản phẩm thành công']);
    }
    public function active_sliders($id){

        DB::table('sliders')->where('id',$id)->update(['status'=>0]);
       
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
    public function store(Request $request)
    {   
        

        $data = $request->except('_token');
        
        $data['created_at'] = new \DateTime();
      
        $imageName = time().'-'.$request->images->getClientOriginalName();

        $request->images->move(public_path('images/sliders'), $imageName);
        
        $data['images'] = $imageName;

        $this->db->insert($data);

      
        // return redirect('/login');
        return $this->route_admin('index', [] ,['success' => 'Thêm sliders thành công']);
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
        
         

        $slider = $this->db->where('id', $id);

        // $id =(string) Str::uuid();

        if ($slider->exists()) {
            $data['slider'] = $slider->first();
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
    public function update(Request $request, $id)
    {
       
        $slider_current = $this->db->where('id', $id)->first();
       
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

    
     

        if (empty($request->images)) {
            $data['images'] = $slider_current->images; 
        } else {
            $image_path = public_path('images/sliders') . "/" . $slider_current->images;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $imageName = time().'-'.$request->images->getClientOriginalName();  
            $request->images->move(public_path('images/sliders'), $imageName);
            $data['images'] = $imageName;
        }

        $this->db->where('id', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa sliders thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->db->where('id', $id);

        if ($slider->exists()) {
            $slider_current = $slider->first();

            if (!empty($slider_current->avatar)) {
                $image_path = public_path('images') . "/" . $slider_current->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $slider->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa slider thành công']);
        } else {
            abort(404);
        }
    } 
}
