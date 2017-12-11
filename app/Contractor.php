<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    //主鍵對外鍵
    public function ContractorsStaff(){
    	return $this->hasOne('App\ContractorStaff','ContractorID');
    }
    public function ContractorsProject(){
    	return $this->hasOne('App\ContractorProject','ContractorID');
    }
}
