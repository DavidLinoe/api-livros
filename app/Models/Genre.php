<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    // Relacionamento: Um gênero tem muitos livros
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Comportamento: Ao deletar um gênero, desvincula seus livros
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($genre) {
            $genre->books()->update(['genre_id' => null]);
        });
    }
}