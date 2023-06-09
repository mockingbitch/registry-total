<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrungTam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tbl_trungtam';

    protected $fillable = [
        'tenTrungTam',
        'tinhThanh',
        'diaChi',
        'trangThai',
    ];
}
