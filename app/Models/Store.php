<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function bookStore()
    {
        return $this->hasMany(BookStore::class,'id','store_id');
    }
}
