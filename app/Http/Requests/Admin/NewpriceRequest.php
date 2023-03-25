<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewpriceRequest extends FormRequest
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
            'name' => request()->route('id') 
                    ? 'required|unique:newprices,name,'.request()->route('id')
                    : 'required|unique:newprices',
            'new_price' => request()->route('id') 
                    ? 'required|unique:newprices,new_price,'.request()->route('id')
                    : 'required|unique:newprices',
            'color' => request()->route('id') 
                    ? 'required|unique:newprices,color,'.request()->route('id')
                    : 'required|unique:newprices',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm cần cập nhật giá ',
            
            
            'new_price.required' => 'Vui lòng nhập giá mới của sản phẩm ',
           

            'color.required' => 'Vui lòng nhập màu sắc của sản phẩm ',
            
        ];
    }
}
