<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TurnoverController extends BaseController
{
    public function __construct()
    {
        parent::__construct('turnovers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $data['turnovers'] =DB::table('turnover')->get();
    
        return $this->view_admin('index',$data);
    }

   
    public function edit($id){
      

    $data['order_shipping'] = DB::table('order_shipping')
        ->where('created_at',$id)
        ->get();
     

        $data['order_product'] = DB::table('order_product')
        ->where('created_at',$id)
        ->get();

        $data['Sales'] = DB::table('turnover')->where('order_date',$id)->get();

        // dd($data);

        return $this->view_admin('edit',$data);
    }


   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turnovers = DB::table('turnover')->where('id_turnover', $id);

        if ($turnovers->exists()) {
            $turnovers->delete();
            return $this->route_admin('index', [] ,['success' => 'Xóa thể loại thành công']);
        } else {
            abort(404);
        }
    }
}
