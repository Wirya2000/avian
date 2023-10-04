<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table_a extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'table_a';
    public $timestamps = false;
    // protected $primaryKey = null;
}
