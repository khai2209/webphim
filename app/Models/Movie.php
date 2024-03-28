<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');// 1 movie thuộc 1 danh mục
    }
    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function movie_genre() {
        return $this->belongsToMany(Genre::class, 'movie_genre', 'movie_id', 'genre_id'); //(model, table, column, column)
    }
    public function episode() {
        return $this->hasMany(Episode::class);
    }
}
