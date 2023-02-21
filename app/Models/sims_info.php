<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sims_info extends Model
{
    use HasFactory;
    protected $table = "sims_info";
    protected $fillable = [
        'type',
        'param',
        'data',
        'uuid'
    ];
}
