<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractorStaff extends Model
{
    public function Contractors(){
        return $this->belongsTo('App\Contractor','ContractorID');
    }
}
