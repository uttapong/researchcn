<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';

    protected $fillable = [
        'file_path','fund_id'
    ];
   public function fund()
  {
      return $this->belongsTo('App\Fund','fund_id');
  }
  public function filename(){
    return str_replace("file/","",$this->file_path);
  }
}
