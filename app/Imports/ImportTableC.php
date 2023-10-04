<?php

namespace App\Imports;

use App\Models\Table_c;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTableC implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Table_c([
          'kode_toko' => $row[0],
          'area_sales' => $row[1],
        ]);
    }
}
