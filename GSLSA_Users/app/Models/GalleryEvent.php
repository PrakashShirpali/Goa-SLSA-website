<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryEvent extends Model
{
    use HasFactory, SoftDeletes;  // Include the SoftDeletes trait

    protected $fillable = [
        'event_title',
        'event_description',
        'slug',
        'event_date',
        'thumbnail_path',
    ];

    protected $dates = ['deleted_at'];  // Ensure 'deleted_at' is treated as a date
}
