<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_d extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'table_d';
    public $timestamps = false;
    // protected $primaryKey = null;
}
