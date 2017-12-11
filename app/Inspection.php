<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    public function ContractorProject(){
        return $this->belongsTo('App\ContractorProject','ContractorProjectID');
    }
}
