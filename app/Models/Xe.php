<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_xe';

    protected $fillable = [
        'giayChungNhan',
        'bienSo',
        'noiDangKy',
        'hangSX',
        'dongXe',
        'mucDichSuDung',
        'user_id',
        'trangThai'
    ];
}
