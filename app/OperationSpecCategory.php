<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSpecCategory extends Model
{
    public function OperationSpecType(){
    	return $this->belongsTo('App\OperationSpecType','OperationSpecTypeID');;
    }
}
