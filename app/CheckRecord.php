<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckRecord extends Model
{
    //
    public function PowerPlantStaff(){
    	return $this->belongsTo('App\PowerPlantStaff','PowerPlantStaffID');
    }
}
