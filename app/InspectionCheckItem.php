<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionCheckItem extends Model
{
    public function Terms(){
    	return $this->belongsTo('App\Terms','TermsID');
    }
    public function OperationSpecItem(){
    	return $this->belongsTo('App\OperationSpecItem','InspectionItemSpecID');
    }
}
