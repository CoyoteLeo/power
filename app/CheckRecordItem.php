<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckRecordItem extends Model
{
    protected $hidden = [
        'Deadline', 'CompleteDate'
    ];
    //
    public function PowerPlantStaff(){
    	return $this->belongsTo('App\PowerPlantStaff','PowerPlantStaffId');
    }
}
