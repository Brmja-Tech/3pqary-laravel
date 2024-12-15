<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'note1', 'note2', 'note3', 'note4',
        'socialLink1', 'socialLink2', 'image',
    ];
    
}
