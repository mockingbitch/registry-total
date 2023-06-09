<?php

namespace App\Imports;

use App\Models\Xe;
use Maatwebsite\Excel\Concerns\ToModel;

class XeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Xe|null
     */
    public function model(array $row)
    {
        return new Xe([
           'giayChungNhan'  => $row[0],
           'bienSo'         => $row[1],
           'noiDangKy'      => $row[2],
           'hangSX'         => $row[3],
           'dongXe'         => $row[4],
           'mucDichSuDung'  => $row[5],
           'tenChuXe'       => $row[6],
           'trangThai'      => $row[7]
        ]);
    }
}
