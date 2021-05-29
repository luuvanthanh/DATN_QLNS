<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreworkerRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'cmnd_no' => 'required|unique:workers|numeric',
            'phone' => 'required|unique:workers|numeric',
            'email' => 'required|email|unique:workers|min:5|max:255',
            'school' => 'required|min:5|max:255',
            'department_id' => 'required',
            'position_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'email' => ':attribute không đúng định dạng địa chỉ email',
            'numeric' => ':attribute không đúng định dạng số ',
            'min' => ':attribute tối thiểu có 5 ký tự',
            'max' => ':attribute tối đa có 255 ký tự',
            'unique' => ':attribute đã tồn tại trong hệ thống'
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Địa chỉ email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
        ];
    }
}
