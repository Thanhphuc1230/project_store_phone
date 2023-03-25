<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_id' => 'required',

            // 'name' => request()->route('id') 
            //         ? 'required|unique:products,name,'.request()->route('id')
            //         : 'required|unique:products',


            'name' => request()->route('uuid') 
                    ? 'required|unique:products,name,'.request()->route('uuid')
                    : 'required|unique:products',


            'price' =>'required',

            'intro' => request()->route('uuid') 
            ? 'required|unique:products,intro,'.request()->route('uuid')
            : 'required|unique:products',

         
            'content' => request()->route('uuid') 
            ? 'required|unique:products,content,'.request()->route('uuid')
            : 'required|unique:products',
            
            'screen' => 'required',
            'color' => 'required',
            'weight' =>'required',
            'quantity' => 'required',
           
            'images' => request()->route('uuid') 
            ? 'unique:products,images,'.request()->route('uuid')
            : 'required|unique:products',
           


       

        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Vui lòng chọn thể loại sản phẩm ',

            'name.required' => 'Vui lòng nhập tên sản phẩm ',
            'name.unique' => 'Tên sản phẩm đã được sử dụng',

            'price.required' => 'Vui lòng nhập số tiền của sản phẩm',

            'intro.required' => 'Vui lòng nhập phần giới thiệu',
            'intro.unique' => 'Phần giới thiệu này đã được sử dụng',

            'content.required' => 'Vui lòng nhập phần thông tin sản phẩm',
            'content.unique' => 'Phần thông tin này đã được sử dụng',
            
            
            'weight.required' => 'Vui lòng nhập trọng lượng của sản phẩm  ',
   

            'screen.required' => 'Vui lòng nhập kích thước của màn hình',

            'color.required' => 'Vui lòng nhập màu sắc của sản phẩm',

            'quantity.required' => 'Vui lòng số lượng của sản phẩm',

            'images.required' => 'Vui lòng nhập hình ảnh của sản phẩm',
            
            // 'price > old_price.required' =>'Gia cu phai lon hon gia moi',
        ];
    }
}
