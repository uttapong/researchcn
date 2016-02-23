<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    public function filetype()
   {
       return $this->belongsTo('App\Filetype','filetype');
   }

   public function application()
  {
      return $this->belongsTo('App\Application','application_id');
  }
}
