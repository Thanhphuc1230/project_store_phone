<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        
        return view('search.search', compact('products'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = DB::table('products')->where('name', 'LIKE', '%' . $request->search . '%')->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    $output .= '<tr>
                    <td>' . $product->id . '</td>
                    <td>' . $product->title . '</td>
                    <td>' . $product->description . '</td>
                    <td>' . $product->price . '</td>
                    </tr>';
                }
            }
            
            return Response($output);
        }
    }
}
