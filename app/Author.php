<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'authorname',
    ];

    public function books()
    {
        return $this->hasMany('App\book');
    }
}
