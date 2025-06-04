<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
protected $fillable = ['title', 'author_id', 'genre_id', 'description'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($book) {
            $book->reviews()->delete();
        });
    }
}