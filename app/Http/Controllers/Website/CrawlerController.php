<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrawlerController extends Controller
{
    public function index ($category, $link)
    {
        $data = [];

        $html = file_get_html($link);

        $element_title = $html->find('.listproduct .item a h3');
        foreach ($element_title as $key => $e) {
            $data[$key]["name"] = trim($e->plaintext);
            $data[$key]["intro"] = "Tóm tắt sản phẩm " . $data[$key]["name"];
            $data[$key]["content"] = "Nội dung sản phẩm " . $data[$key]["name"];
            
            // $data[$key]["status"] = 1;
            $data[$key]["uuid"] = Str::uuid();
            $data[$key]["user_id"] = 1;
            $data[$key]["screen"] = 20;
            $data[$key]["category_id"] = $category;
            $data[$key]["color"] = ".";
            $data[$key]["weight"] ="20";
            $data[$key]["quantity"] ="10";
            $data[$key]["status"] ="1";
            $data[$key]["created_at"] = New \Datetime(); 
        }
        
        $element_price = $html->find('.listproduct .item a');
        foreach ($element_price as $key => $e) {
            if (count($element_title) > $key) {
                $price = (int)$e->getAttribute("data-price");
                $data[$key]["price"] = $price;
            }
        }

      


        $element_img = $html->find('.listproduct .item a .item-img img');
        foreach ($element_img as $key => $e) {
            if (count($element_title) > $key) {
                if ($e->getAttribute("data-src") == false) {
                    $img_product = $e->src;
                } else {
                    $img_product = $e->getAttribute("data-src");
                }

                $file_name = basename($img_product);
                $file_path_in_src = public_path("images/products/$file_name");
                
                if (!empty($this->curl_image($img_product))) {
                    if (!file_put_contents($file_path_in_src, $this->curl_image($img_product))) {
                        echo "File downloading failed.: " . $data[$key]["name"];
                    }
                }

                $data[$key]["images"] = $file_name;

           
            }
        }
        

        $element_price = $html->find('.listproduct .item a');
        foreach ($element_price as $key => $e) {
            if (count($element_title) > $key) {
                $price = (int)$e->getAttribute("data-price");
                $data[$key]["price"] = $price;
            }
        }
                // dd($data);
        DB::table('products')->insert($data);
        
    }

    public function featchAllTGDD () 
    {
        $result = DB::table('categories')->where('parent_id',  '>' ,1 )->get();

   
        foreach ($result as $item) {
            $link = $item->link;
            $category_id = $item->id;

            $this->index ($category_id, $link);
        }
    }

    public function curl_image ($link) 
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$link);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $query;
    }
}
