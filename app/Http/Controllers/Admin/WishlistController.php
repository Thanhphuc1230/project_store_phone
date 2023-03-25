<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WishlistController extends BaseController
{   public function __construct()
    {
        parent::__construct('wishlists');
    }

    public function index(){
        $data['wishlist'] = DB::table('top_wishlist')
        ->orderBy('likes_top','DESC')
        ->get();
        
      
        return $this->view_admin('index', $data);
    }

    public function destroy($id){
       
        $wishlist = DB::table('top_wishlist')->where('id_top', $id);

        if ($wishlist->exists()) {
            $wishlist->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa thể loại thành công']);
        } else {
            abort(404);
        }
       
       
    }
}
