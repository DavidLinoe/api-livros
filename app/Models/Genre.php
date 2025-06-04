<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($genre) {
            $genre->books()->update(['genre_id' => null]);
        });
    }
}