<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'bio',
        'image',
        'photo',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
