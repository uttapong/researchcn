<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filetype as Filetype;

class Upload extends Model
{
    protected $table = 'uploads';

    public function fileType()
   {
       return $this->belongsTo('App\Filetype','filetype');
   }

   public function application()
  {
      return $this->belongsTo('App\Application','application_id');
  }
  public function getFileType(){
  	return FileType::find($this->filetype)->name;
  }
}
