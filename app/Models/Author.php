<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'bio'];

    // Relacionamento: Um autor tem muitos livros
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Comportamento: Ao deletar um autor, deleta seus livros (e reviews por cascade)
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($author) {
            $author->books()->delete();
        });
    }
}