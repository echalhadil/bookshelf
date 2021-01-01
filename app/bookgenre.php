<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookgenre extends Model
{
    protected $fillable = [
        'book_id', 'genre_id', 
    ];

    
}
