<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStore extends Model
{
    use HasFactory;

    protected $table = 'book_store';
    protected $guarded = [];

    public function books()
    {
        return $this->belongsTo(Book::class,'id','book_id');
    }

    public function stores()
    {
        return $this->belongsTo(Store::class,'id','store_id');
    }
}
