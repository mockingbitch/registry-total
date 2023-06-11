<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'confirmPassword'   => 'same:password',
            'tinhThanh'         => 'required',
            'thuongTru'         => 'required',
            'cccd'              => 'required',
            'trungtam_id'       => 'required|exists:tbl_trungtam,id',
            'role'              => 'required',
            'trangThai'         => 'required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function messages(): array
    {
        return [
            'name.required'              => 'Tên không được bỏ trống',
            'email.required'             => 'Email không được bỏ trống',
            'email.email'                => 'Email sai định dạng',
            'email.unique'               => 'Email đã tồn tại',
            'password.required'          => 'Password không được bỏ trống',
            'confirmPassword.same'       => 'Vui lòng xác thực lại mật khẩu',
            'tinhThanh.required'         => 'Tỉnh thành không được bỏ trống',
            'thuongTru.required'         => 'Thường trú không được bỏ trống',
            'cccd.required'              => 'CCCD không được bỏ trống',
            'trungtam_id.required'       => 'Trung tâm không được bỏ trống',
            'trungtam_id.exists'         => 'Không tìm thấy trung tâm',
            'role.required'              => 'Vai trò không được bỏ trống',
            'trangThai.required'         => 'Trạng thái không được bỏ trống'
        ];
    }
}
