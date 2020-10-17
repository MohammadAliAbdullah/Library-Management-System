<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $fillable = [
        'studentName', 'registerNo', 'book_id', 'department_id', 'author_id', 'phoneNo', 'returnBook',
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
