<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_c extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'table_c';
    public $timestamps = false;
    // protected $primaryKey = null;
}
