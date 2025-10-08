<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructor_id',
        'type',
        'price',
        'old_price',
        'start_from',
        'duration',
        'lesson_count',
        'prerequisites',
        'difficulty',
        'image',
        'thumbnail_image',
        'thumbnail_video',
        'status',
    ];

    /**
     * Example relationship (optional if you have instructors table)
     */
    public function instructor()
    {
        // return $this->belongsTo(Instructor::class);
    }
}
