<?php

namespace App\Imports;

use App\Models\Table_d;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTableD implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Table_d([
          'kode_sales' => $row[0],
          'nama_sales' => $row[1],
        ]);
    }
}
