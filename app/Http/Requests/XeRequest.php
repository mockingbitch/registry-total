<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class XeRequest extends FormRequest
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
            'tenChuXe'      => 'required',
            'giayChungNhan' => 'required',
            'bienSo'        => 'required|max:10',
            'noiDangKy'     => 'required',
            'hangSX'        => 'required',
            'dongXe'        => 'required|max:20',
            'mucDichSuDung' => 'required',
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
            'tenChuXe.required'      => 'Tên chủ xe không được bỏ trống',
            'giayChungNhan.required' => 'Giấy chứng nhận không được bỏ trống',
            'bienSo.required'        => 'Biển số không được bỏ trống',
            'bienSo.max'             => 'Giới hạn 10 ký tự',
            'noiDangKy.required'     => 'Nơi đăng ký không được bỏ trống',
            'hangSX.required'        => 'Hãng sản xuất không được bỏ trống',
            'dongXe.required'        => 'Dòng xe không được bỏ trống',
            'dongXe.max'             => 'Giới hạn 20 ký tự',
            'mucDichSuDung.required' => 'Mục đích sử dụng không được bỏ trống',
            'trangThai.required'     => 'Trạng thái không được bỏ trống'
        ];
    }
}
