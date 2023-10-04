<?php

namespace App\Imports;

use App\Models\Table_b;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTableB implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      // dd($row);
        return new Table_b([
            "kode_toko" => $row[0],
            "nominal_transaksi" => $row[1],
        ]);
    }

    // public function onRow(Row $row)
    // {
    //     $rowIndex = $row->getIndex();
    //     $row      = $row->toArray();
    
    //     Table_b::create([
    //         'kode_toko' => $row[0],
    //         'nominal_transaksi' => $row[1],
    //     ]);
    // }
}
