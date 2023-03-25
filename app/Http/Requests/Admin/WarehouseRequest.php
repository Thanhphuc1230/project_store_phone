<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WarehouseRequest extends FormRequest
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
            'product_id' => 'required',
            'import' => 'required',
            'export' => 'required',
            'price_cost' => 'required',
            'price_sale' => 'required',
            'price_discount' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Vui lòng nhập tên của sản phẩm',
            'import.required' => 'Vui lòng nhập số lượng nhập vào của sản phẩm',
            'export.required' => 'Vui lòng nhập số lượng xuất ra  của sản phẩm',
            'price_cost.required' => 'Vui lòng nhập giá vốn của sản phẩm',
            'price_sale.required' => 'Vui lòng nhập giá bán của sản phẩm',
            'price_discount.required' => 'Vui lòng nhập giá giảm của sản phẩm',
            
           
        ];
    }
}
