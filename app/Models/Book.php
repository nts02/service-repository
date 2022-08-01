<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

    public function bookStore()
    {
        return $this->hasMany(BookStore::class,'id','book_id');
    }

}
