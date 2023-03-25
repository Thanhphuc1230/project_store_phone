<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use  Illuminate\Http\Request;
class NewController extends BaseController
{
    public function __construct()
    {
        parent::__construct('news');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {   
         $data['news'] = $this->db->get();
        
         
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
    public function unactive_news($id){

        DB::table('news')->where('id',$id)->update(['status'=>1]);
  
        return $this->route_admin('index', [] ,['success' => 'Kích hoạt sản phẩm thành công']);
    }
    public function active_news($id){

        DB::table('news')->where('id',$id)->update(['status'=>0]);
    
        return $this->route_admin('index', [] ,['success' => 'Tắt kích hoạt sản phẩm thành công']);
    }


    public function unactive_comments($id){

        DB::table('comments')->where('id',$id)->update(['status_comments'=>1]);
  
        return back()->with('success', 'Cho phép comments hiện thị trên trang web ');
    }
    public function active_comments($id){

        DB::table('comments')->where('id',$id)->update(['status_comments'=>0]);
    
        return back()->with('success', 'Không cho phép comments hiện thị trên trang web');
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
        $new = $this->db->where('id', $id);

        if ($new->exists()) {
            $data['new'] = $new->first();

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
        
        return $this->route_admin('index', [] ,['success' => 'Sửa bài viết thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = $this->db->where('id', $id);

        if ($new->exists()) {
            $new_current = $new->first();

            if (!empty($new_current->avatar)) {
                $image_path = public_path('images') . "/" . $new_current->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $new->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa bài viết thành công']);
        } else {
            abort(404);
        }
    }
    public function acceptCmt(){
            // lấy dữ liệu 3 bảng gom lại
            $data['comments'] = DB::table('comments')
            ->select('comments.*','users.fullname','users.avatar','news.intro', DB::raw('null as name'))
            ->join('users','comments.user_id_comments','=','users.uuid')
            ->join('news','comments.post_id_comments','=','news.uuid')
            ->union(DB::table('comments')
                ->select('comments.*','users.fullname','users.avatar', 'products.name', DB::raw('null as intro'))
                ->join('users','comments.user_id_comments','=','users.uuid')
                ->join('products','comments.post_id_comments','=','products.uuid')
            )
            ->get();
     


            return view('admin.modules.news.comments',$data);
    }
    public function DestroyCmt($id){
       
       

        $new = DB::table('comments')->where('id',$id);

        if ($new->exists()) {
            

            

            $new->delete();
            return back()->with('success', 'Xóa comments thành công');
        } else {
            abort(404);
        }
    }
   

    
}
