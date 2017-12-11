<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorProject extends Model
{
    public function Contractors(){
        return $this->belongsTo('App\Contractor','ContractorID');
    }
    public function PowerPlantStaff(){
        return $this->belongsTo('App\PowerPlantStaff','PowerPlantStaffID');
    }
    public function PowerPlantDep(){
        return $this->belongsTo('App\PowerPlantDep','PowerPlantDepID');
    }
}
