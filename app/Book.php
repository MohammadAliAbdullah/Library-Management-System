<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'StudentName', 'department_id', 'author_id', 'price',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
