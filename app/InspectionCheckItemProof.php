<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionCheckItemProof extends Model
{
    public function InspectionSpec(){
    	return $this->belongsTo('App\InspectionSpec','InspectionItemSpecID');
    }
}
