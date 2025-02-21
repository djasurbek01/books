<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'status', 'cover_url'];

    protected $attributes = [
        'status' => 'chernovik',
        'cover_url' => 'covers/default_cover.jpg',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
}
