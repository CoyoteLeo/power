<?php




/*
namespace App;
class PowerPlantStaff extends Model
use Illuminate\Database\Eloquent\Model;
*/
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
class PowerPlantStaff extends Authenticatable
{
    protected $guard = 'power_plant_staffs';
    protected $fillable = [
        'Name', 'Email', 'Password' ,
    ];
    protected $hidden = [
        'remember_token'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    //外鍵 對 主鍵
    public function PowerPlantDep(){
        return $this->belongsTo('App\PowerPlantDep','PowerPlantDepID');
    }

    //主鍵 對 外鍵
    public function PowerPlantNew(){
        return $this->hasOne('App\PowerPlantNews','PowerPlantStaffID');
    }
    public function CheckRecode(){
    	return $this->hasOne('App\CheckRecode','PowerPlantStaffID');
    }
    public function CheckRecodesItem(){
    	return $this->hasOne('App\CheckRecodeItem','PowerPlantDepID');
    }
    public function ContractorsProject(){
    	return $this->hasOne('App\ContractorProject','PowerPlantDepID');
    }
}
