<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'CODE_ID', 'VENDOR', 'MEASURE', 'RECEIVING', 'DATE'
    ];
    protected $table = 'container';
    protected $primaryKey = 'ID';
}
