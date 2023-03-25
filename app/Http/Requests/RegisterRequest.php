<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required',

            'phone' => request()->route('id') 
                    ? 'required|unique:users,phone,'.request()->route('id')
                    : 'required|unique:users',

            'email' => request()->route('id') 
                    ? 'required|email|unique:users,email,'.request()->route('id')
                    : 'required|email|unique:users',

            'password' => request()->route('id') 
                    ? 'confirmed' 
                    : 'required|confirmed|min:8',



        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập Họ và tên ',
            

            'phone.required' => 'Vui lòng nhập SĐT của bạn',
            'phone.unique' => 'SĐT đã được sử dụng',

            
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã tồn tại rồi',
            'email.email' => 'Đây không phải là email',

            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận không chính xác',
            'password.min'  => 'Mật khẩu ít nhất 8 ký tự',
    
        ];
    }
}
