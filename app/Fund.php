<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = 'funds';

    public function user()
    {
       return $this->belongsTo('App\User', 'creator');
    }

    public function applications()
    {
        return $this->hasMany('App\Application', 'fund');
    }
    public function downloads(){
      return $this->hasMany('App\Download','fund_id');
    }

    public function countAdminActive(){
        return $this->applications()->where('status', 'in', '()')
    }
}
