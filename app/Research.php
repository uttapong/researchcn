<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
     protected $table = 'research';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'authors', 'abstract','type','publication_name','published_year','issue','published_month','published_page'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
