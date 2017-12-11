<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSpecItem extends Model
{
    public function OperationSpecCategory(){
    	return $this->belongsTo('App\OperationSpecCategory','OperationSpecCategoryID');
    }
}