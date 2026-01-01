<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesLegalheir extends Model
{
    use HasFactory, SoftDeletes;  // Include the SoftDeletes trait

    protected $fillable = [
        'name',
        'role',
        'contact_no',
        'path',
    ];

    protected $dates = ['deleted_at'];  // Ensure 'deleted_at' is treated as a date
}
