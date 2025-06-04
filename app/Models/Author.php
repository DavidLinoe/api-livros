<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'bio'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($author) {
            $author->books()->delete();
        });
    }
}