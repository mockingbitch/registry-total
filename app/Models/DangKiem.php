<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DangKiem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_dangkiem';

    protected $fillable = [
        'maSoCap',
        'ngayCap',
        'ngayHetHan',
        'center_id',
        'trangThai'
    ];
}
