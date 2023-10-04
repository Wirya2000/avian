<?php

namespace App\Exports;

use App\Models\Table_b;
use Maatwebsite\Excel\Concerns\WithHeadings;  
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTableB implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Table_b::all();
    }

    public function headings(): array
    {
        return [
            'Kode Toko',
            'Area Sales',
        ];
    }
}
