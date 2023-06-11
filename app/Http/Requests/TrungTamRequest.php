<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrungTamRequest extends FormRequest
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
            'tenTrungTam'   => 'required',
            'tinhThanh'     => 'required',
            'diaChi'        => 'required',
            'trangThai'     => 'required'
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
            'tenTrungTam.required'   => 'Tên trung tâm không được bỏ trống',
            'tinhThanh.required'     => 'Tỉnh thành không được bỏ trống',
            'diaChi.required'        => 'Địa chỉ không được bỏ trống',
            'trangThai.required'     => 'Trạng thái không được bỏ trống'
        ];
    }
}
