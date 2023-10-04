<?php

namespace App\Exports;

use App\Models\Table_a;
use Maatwebsite\Excel\Concerns\WithHeadings;  
use Maatwebsite\Excel\Concerns\FromCollection;

class Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Table_a::all();
    }

    public function headings(): array
    {
        return [
            'Kode Toko Baru',
            'Kode Toko Lama',
        ];
    }
}
