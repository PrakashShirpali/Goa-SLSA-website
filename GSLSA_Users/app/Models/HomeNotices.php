<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeNotices extends Model
{
    use HasFactory, SoftDeletes;  // Include the SoftDeletes trait

    protected $fillable = [
        'notice',
        'path',
    ];

    protected $dates = ['deleted_at'];  // Ensure 'deleted_at' is treated as a date
}
