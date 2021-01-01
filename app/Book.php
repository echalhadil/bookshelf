<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'description', 'picture', 'pdf', 'published_by', 'download', 'review', 'read',
    ];


    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function bookgenres()
    {
        return $this->hasMany('App\bookgenre');
    }

}
