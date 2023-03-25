<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'title' => request()->route('id') 
                    ? 'required|unique:news,title,'.request()->route('id')
                    : 'required|unique:news',
            'intro' => request()->route('id') 
            ? 'required|unique:news,intro,'.request()->route('id')
            : 'required|unique:news',
            'content' => request()->route('id') 
            ? 'required|unique:news,content,'.request()->route('id')
            : 'required|unique:news',
            'author' => 'required',

            'avatar' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề cho bài viết',
            'title.unique' => 'Tiêu đề này đã tồn tại',
            'intro.required' => 'Vui lòng nhập phần giới thiệu cho bài viết',
            'intro.unique' => 'Phần giới thiệu này đã tồn tại',
            'content.required' => 'Vui lòng nhập phần giới thiệu cho bài viết',
            'content.unique' => 'Phần giới thiệu này đã tồn tại',
            'author.required' => 'Vui lòng nhập thông tin người đăng  bài viết',
            'avatar.required' => 'Vui lòng nhập hình đại diện của bài viết',
            
        ];
    }
}
