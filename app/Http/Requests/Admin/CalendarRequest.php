<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
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
            'start' =>'required',
            'end' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập tên nhân viên ca trực ',
            'start.required' => 'Vui lòng nhập thời gian bắt đầu ca trực',
            'end.required' => 'Vui lòng nhập thời gian hết ca trực'
        ];
    }
}
