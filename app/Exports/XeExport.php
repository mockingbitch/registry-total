<?php

namespace App\Exports;

use App\Models\Xe;
use Maatwebsite\Excel\Concerns\FromCollection;

class XeExport implements FromCollection
{
    public function collection()
    {
        return Xe::all();
    }
}