<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $fillable = [
        'title',
        'image',
        'note',
    ];


    public function videos()
    {
        return $this->hasMany(courses_video::class, 'course_id', 'id');
    }
    
}
