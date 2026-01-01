<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeYoutubeVideos extends BaseModel
{
    use HasFactory, SoftDeletes;  // Include the SoftDeletes trait

    protected $fillable = [
        'title',
        'link',
    ];

    protected $dates = ['deleted_at'];  // Ensure 'deleted_at' is treated as a date
}
