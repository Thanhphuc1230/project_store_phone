<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use  Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UserController extends BaseController
{   
    public function __construct()
    {
        parent::__construct('users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {      
         $data['users'] = $this->db->get();

      
        


        return $this->view_admin('index',$data);
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
    public function active_user($id){

       DB::table('users')->where('id',$id)->update(['status_user' => 0]);
        
        return $this->route_admin('index', [] ,['success' => 'Người dùng đã bị chặn đăng nhập']);
    }
    public function unactive_user($id){

        DB::table('users')->where('id',$id)->update(['status_user' => 1]);
    
        return $this->route_admin('index', [] ,['success' => 'Người dùng được hoạt động']);
    }
    
        // view($this->view . '.create')
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {   
        

        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();
        
        $data['uuid'] = Str::uuid();
        $data['status_user'] = '1';
  

        $imageName = time().'-'.$request->avatar->getClientOriginalName();  
        $request->avatar->move(public_path('images/users'), $imageName);
        $data['avatar'] = $imageName;

        $this->db->insert($data);

      
        // return redirect('/login');
        return $this->route_admin('index', [] ,['success' => 'Thêm thành viên thành công']);
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
        
         

        $user = $this->db->where('uuid', $id);
            
        // $id =(string) Str::uuid();

        if ($user->exists()) {
            $data['user'] = $user->first();
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
    public function update(UserRequest $request, $id)
    {
        
        $user_current = $this->db->where('uuid', $id)->first();
 
        $data = $request->except('_token', 'password_confirmation');
        $data['updated_at'] = new \DateTime();

        if (empty($request->password)) {
            $data['password'] = $user_current->password; 
        } else {
            $request->validate([
                'password' => 'min:8'
            ], [
                'password.min' => 'Mật khẩu ít nhất 8 ký tự'
            ]);

            $data['password'] = bcrypt($request->password);
        }

        if (empty($request->avatar)) {
            $data['avatar'] = $user_current->avatar; 
        } else {
            $image_path = public_path('images/users') . "/" . $user_current->avatar;
            // if (file_exists($image_path)) {
            //     unlink($image_path);
            // }

            $imageName = time().'-'.$request->avatar->getClientOriginalName();  
            $request->avatar->move(public_path('images/users'), $imageName);
            $data['avatar'] = $imageName;
        }

        $this->db->where('uuid', $id)->update($data);

        return $this->route_admin('index', [] ,['success' => 'Sửa thành viên thành công']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->db->where('uuid', $id);
    

        $user_id = $user->pluck('id')->toArray();


        $id_status =DB::table('order_status')->where('user_id',$user_id);
        $id_shipping =$id_status->pluck('shipping_id')->toArray();
       
        $order_status = DB::table('order_status')->where('user_id',$user_id);
      
        $product =DB::table('order_product')->where('order_status',$id_shipping);
  
        $data =DB::table('order_shipping')->where('id',$id_shipping);  
       
        $comments = DB::table('comments')->where('user_id_comments',$id);
  
        $like =DB::table('likes')->where('user_id',$user_id);
     
  
        if ($user->exists()) {
            $user_current = $user->first();

            if (!empty($user_current->avatar)) {
                $image_path = public_path('images') . "/" . $user_current->avatar;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
          
            $order_status->delete();
            $user->delete();
            $data->delete();
            $product->delete();
            $comments->delete();
            $like->delete();

            return $this->route_admin('index', [] ,['success' => 'Xóa thành viên thành công']);
        } else {
            abort(404);
        }
    } 
}
