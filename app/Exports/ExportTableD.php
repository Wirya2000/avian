<?php

namespace App\Exports;

use App\Models\Table_d;
use Maatwebsite\Excel\Concerns\WithHeadings;  
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTableD implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Table_d::all();
    }

    public function headings(): array
    {
        return [
            'Kode Sales',
            'Nama Sales',
        ];
    }
}
