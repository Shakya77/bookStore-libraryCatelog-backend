<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected   $fillable = [
        'title',
        'description',
        'published_at',
        'author_id',
        'category_id',
        'cover_image',
        'sample_pdf',
        'rating_avg',
        'is_active',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
