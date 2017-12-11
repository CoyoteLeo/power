<?php

/*
namespace App;
use Illuminate\Database\Eloquent\Model;
class PowerPlantNews extends Model
*/


namespace App;
use Illuminate\Database\Eloquent\Model;


class PowerPlantNews extends Model
{
	
	//外鍵 對 主鍵
    public function PowerPlantStaff(){
    	return $this->belongsTo('App\PowerPlantStaff','PowerPlantStaffId');
    }
    public function PowerPlantDep(){
    	return $this->belongsTo('App\PowerPlantDep','PowerPlantDepId');

    }
}
