<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translates';

    public function creator()
    {
       return $this->belongsTo('App\User', 'owner');
    }

    public function docs()
    {
        return $this->hasMany('App\Translationdoc', 'translate_id');
    }
}
