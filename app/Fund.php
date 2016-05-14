<?php

namespace App;

use App\Application as Application;
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
        $allApp=Application::where('fund',$this->id)->whereIn('status', array('applied','signed_agreement','rejected_agreement','first_payment','second_payment','second_progress_report','finalized','request_extend','request_extend'))->get();

        return count($allApp);
    }

    public function countFinish(){
        $allApp=Application::where('fund',$this->id)->whereIn('status', array('approved_project_finished'))->get();

        return count($allApp);
    }
}
