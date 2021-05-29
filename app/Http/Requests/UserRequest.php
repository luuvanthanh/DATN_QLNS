<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users|min:4|max:255',
            'email' => 'required|email|unique:users|min:8|max:255',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng',
            'min' => ':attribute tối thiểu có 4 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'unique' => ':attribute đã tồn tại trong hệ thống'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên người dùng',
            'email' => 'Địa chỉ email',
        ];
    }

}
