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
            'tenChuXe'       => $row[1],
            'giayChungNhan'  => $row[2],
            'bienSo'         => $row[3],
            'noiDangKy'      => $row[4],
            'hangSX'         => $row[5],
            'dongXe'         => $row[6],
            'mucDichSuDung'  => $row[7],
            'trangThai'      => $row[8]
        ]);
    }
}
