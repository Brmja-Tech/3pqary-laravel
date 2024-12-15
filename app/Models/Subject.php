<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'note',
        'image',
        'grade_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
