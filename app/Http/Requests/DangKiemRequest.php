<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKiemRequest extends FormRequest
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
            'xe_id'         => 'required|exists:tbl_xe,id',
            'maSoCap'       => 'required',
            'ngayCap'       => 'required',
            'ngayHetHan'    => 'required|after:ngayCap',
            'trungtam_id'   => 'required|exists:tbl_trungtam,id',
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
            'xe_id.required'         => 'Không được bỏ trống xe',
            'xe_id.exists'           => 'Không tìm thấy xe',
            'maSoCap.required'       => 'Mã số cấp không được bỏ trống',
            'ngayCap.required'       => 'Ngày cấp không được bỏ trống',
            'ngayHetHan.required'    => 'Ngày hết hạn không được bỏ trống',
            'ngayHetHan.after'  => 'Ngày hết hạn phải > ngày cấp',
            'trungtam_id.required'   => 'Không được bỏ trống trung tâm',
            'trungtam_id.exists'     => 'Không tìm thấy trung tâm',
            'trangThai.required'     => 'Không được bỏ trống trạng thái'
        ];
    }
}
