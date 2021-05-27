<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredepartmentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:departments|min:5|max:255'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min' => ':attribute tối thiểu có 5 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'unique' => ':attribute đã tồn tại trong hệ thống'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên phòng ban',
            
        ];
    }
}
