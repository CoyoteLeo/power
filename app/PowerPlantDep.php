<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerPlantDep extends Model
{
	public $fillable = ['Dep','Class'];
	
    public function PowerPlantStaff(){
    	return $this->hasOne('App\PowerPlantStaff','PowerPlantDepID');
    }
    public function ContractorsProject(){
    	return $this->hasOne('App\ContractorProject','PowerPlantDepID');
    }
    public function PowerPlantNews(){
    	return $this->hasOne('App\PowerPlantNews','PowerPlantDepID');
    }
}
