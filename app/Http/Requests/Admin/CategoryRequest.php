<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name_cate' => request()->route('id') 
                    ? 'required|unique:categories,name_cate,'.request()->route('id')
                    : 'required|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name_cate.required' => 'Vui lòng nhập tên của nhãn hàng',
            'name_cate.unique' => 'Nhãn hàng này đã tồn tại',
        ];
    }
}
