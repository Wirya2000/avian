<?php

namespace App\Imports;

use App\Models\Table_a;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportTableA implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Table_a([
          'kode_toko_baru' => $row[0],
          'kode_toko_lama' => $row[1],
        ]);
    }
}
