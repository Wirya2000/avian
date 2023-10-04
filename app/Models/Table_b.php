<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_b extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['kode_toko','nominal_transaksi'];
    protected $table = 'table_b';
    public $timestamps = false;
    // protected $primaryKey = null;
}
