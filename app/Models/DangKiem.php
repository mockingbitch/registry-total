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
        'xe_id',
        'maSoCap',
        'ngayCap',
        'ngayHetHan',
        'trungtam_id',
        'trangThai'
    ];

    public function xe()
    {
        return $this->belongsTo(\App\Models\Xe::class, 'xe_id');
    }

    public function trungtam()
    {
        return $this->belongsTo(\App\Models\TrungTam::class, 'trungtam_id');
    }
}
