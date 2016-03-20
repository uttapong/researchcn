<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translationdoc extends Model
{
    protected $table = 'translate_doc';

    protected $fillable = [
        'file_path','translate_id','type','status'
    ];
   public function tranlation()
  {
      return $this->belongsTo('App\Translation','translation_id');
  }
  public function filename(){
    return str_replace("file/","",$this->file_path);
  }
}
