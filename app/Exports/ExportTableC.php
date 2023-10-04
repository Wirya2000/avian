<?php

namespace App\Exports;

use App\Models\Table_c;
use Maatwebsite\Excel\Concerns\WithHeadings;  
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTableC implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Table_c::all();
    }

    public function headings(): array
    {
        return [
            'Kode Toko',
            'Area Sales',
        ];
    }
}
