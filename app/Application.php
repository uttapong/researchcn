<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    public function fund()
   {
       return $this->belongsTo('App\Fund','fund');
   }

   public function user()
  {
      return $this->belongsTo('App\User','owner');
  }

   public function uploads()
   {
       return $this->hasMany('App\Upload','application_id');
   }
}
