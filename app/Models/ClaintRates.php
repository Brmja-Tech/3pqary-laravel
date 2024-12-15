<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaintRates extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'note',
    ];
}
