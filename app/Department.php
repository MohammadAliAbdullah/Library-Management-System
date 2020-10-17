<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = true;

    protected $fillable = [
            'departmentName',
        ];

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function book()
    {
        return $this->hasMany('App\book');
    }

    public function issuebook()
    {
        return $this->hasMany('App\IssueBook');
    }
}
