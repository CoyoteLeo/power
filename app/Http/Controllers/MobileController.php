<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Excel;

use App\CheckRecord;
use App\CheckRecordItem;
use App\CheckRecordItemProof;
use App\CheckRecordStaff;

use App\Inspection;
use App\InspectionCheckItem;
use App\InspectionCheckItemProof;
use App\InspectionSpec;

use App\Contractor;
use App\ContractorProject;
use App\ContractorStaff;

use App\PowerPlantDep;
use App\PowerPlantNews;
use App\PowerPlantStaff;

use App\Terms;

use App\Res;

class MobileController extends Controller
{
	public function index(){
    	return view('api.mobile.index');
    }
	public function PowerPlantDep(){
    	return view('api.mobile.PowerPlantDep');
    }
	public function PowerPlantDep_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {

					$insert[] = ['Dep' => $value->dep, 'Class' => $value->class, 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$PowerPlantDep=new PowerPlantDep;
					$PowerPlantDep->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function PowerPlantNews(){
    	return view('api.mobile.PowerPlantNews');
    }
	public function PowerPlantNews_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['Titile' 	  => $value->titile, 	  'Content'			  => $value->content, 
								 'Date'  	  => $value->date, 	  	  'PowerPlantStaffId' => $value->powerplantstaffid, 'PowerPlantDepId' =>  $value->powerplantdepid,
								 'created_at' => $value->created_at , 'updated_at'		  => $value->updated_at];
				}

				if(!empty($insert)){
					$PowerPlantNews=new PowerPlantNews;
					$PowerPlantNews->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function PowerPlantStaff(){
    	return view('api.mobile.PowerPlantStaff');
    }
	public function PowerPlantStaff_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['PID' 			   => $value->pid, 			   'Name' 	  => $value->name,  'password' => $value->password, 'remember_token' => $value->remember_token , 
					 'PowerPlantDepID' => $value->powerplantdepid ,'Titile'   => $value->titile,'Email'    => $value->email,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$PowerPlantStaff=new PowerPlantStaff;
					$PowerPlantStaff->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	//Contractor
	public function Contractor(){
    	return view('api.mobile.Contractor');
    }
	public function Contractor_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['CompanyName' => $value->companyname, 'CompanyId' => $value->companyid, 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$Contractor=new Contractor;
					$Contractor->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function ContractorStaff(){
    	return view('api.mobile.ContractorStaff');
    }
	public function ContractorStaff_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['ContractorID' => $value->contractorid, 'PID'			=> $value->pid, 
								 'Name'  	    => $value->name, 	  	 'Titile' 		=> $value->titile,
								 'created_at'   => $value->created_at ,  'updated_at'	=> $value->updated_at];
				}

				if(!empty($insert)){
					$ContractorStaff=new ContractorStaff;
					$ContractorStaff->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function ContractorProject(){
    	return view('api.mobile.ContractorProject');
    }
	public function ContractorProject_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['ContractorID'  => $value->contractorid,   'name' 	 		  => $value->name,  		 'StartDate' => $value->startdate, 'EndDate' => $value->enddate , 
					 'Year'          => $value->year ,			'PowerPlantDepID' => $value->powerplantdepid,'PowerPlantStaffID' => $value->powerplantstaffid,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$ContractorProject=new ContractorProject;
					$ContractorProject->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	//inspection
	public function Inspection(){
    	return view('api.mobile.Inspection');
    }
	public function Inspection_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] =
					['Date' => $value->date, 'Time' => $value->time, 'ContractorProjectID' => $value->contractorprojectid , 
					 'InspectionWorkNumber' => $value->inspectionworknumber,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$Inspection=new Inspection;
					$Inspection->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function InspectionCheckItem(){
    	return view('api.mobile.InspectionCheckItem');
    }
	public function InspectionCheckItem_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					["InspectionWorkNumber" => $value->inspectionworknumber,"InspectionItemSpecID" => $value->inspectionitemspecid, 
					 "Type" => $value->type, "TermsID" => $value->termsid,"Remark" => $value->remark,
					'created_at'   => $value->created_at ,  'updated_at'	=> $value->updated_at];
				}

				if(!empty($insert)){
					$InspectionCheckItem=new InspectionCheckItem;
					$InspectionCheckItem->insert($insert);
					return 'success';

				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function InspectionCheckItemProof(){
    	return view('api.mobile.InspectionCheckItemProof');
    }
	public function InspectionCheckItemProof_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['InspectionWorkNumber'  => $value->inspectionworknumber,   'InspectionItemSpecID'=> $value->inspectionitemspecid,
					 'FileName'     		 => $value->filename, 				'Path' => $value->path , 
					 'Type'       		     => $value->type ,					'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$InspectionCheckItemProof=new InspectionCheckItemProof;
					$InspectionCheckItemProof->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function InspectionSpec(){
    	return view('api.mobile.InspectionSpec');
    }
	public function InspectionSpec_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['Year'  => $value->year,'ItemB'=>$value->itemb,'ItemL' => $value->iteml, 'Item' => $value->item , 
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$InspectionSpec=new InspectionSpec;
					$InspectionSpec->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	//checkrecord
	public function CheckRecord(){
    	return view('api.mobile.CheckRecord');
    }
	public function CheckRecord_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] =
					['Date' => $value->date, 'Time' => $value->time, 'CheckRecordWorkNumber' => $value->checkrecordworknumber , 
					 'PowerPlantStaffID' => $value->powerplantstaffid,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$CheckRecord=new CheckRecord;
					$CheckRecord->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function CheckRecordItem(){
    	return view('api.mobile.CheckRecordItem');
    }
	public function CheckRecordItem_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['CheckWorkNumber' => $value->checkworknumber,"Index" => $value->index, 
					 "PowerPlantStaffId" => $value->powerplantstaffid, "Area" => $value->area,"Content" => $value->content,
					'created_at'   => $value->created_at ,  'updated_at'	=> $value->updated_at];
				}

				if(!empty($insert)){
					$CheckRecordItem=new CheckRecordItem;
					$CheckRecordItem->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function CheckRecordItemProof(){
    	return view('api.mobile.CheckRecordItemProof');
    }
	public function CheckRecordItemProof_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['CheckRecordWorkNumber' => $value->checkrecordworknumber,'CheckRecordIndex'=> $value->checkrecordindex,
					 'Index'     		 	 => $value->index, 				  'FileName' 		=> $value->filename,'Path' => $value->path , 
					 'Type'       		     => $value->type ,				  'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$CheckRecordItemProof=new CheckRecordItemProof;
					$CheckRecordItemProof->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function CheckRecordStaff(){
    	return view('api.mobile.CheckRecordStaff');
    }
	public function CheckRecordStaff_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['CheckRecordWorkNumber'  => $value->checkrecordworknumber,'PowerPlantStaffId'=>$value->powerplantstaffid,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$CheckRecordStaff=new CheckRecordStaff;
					$CheckRecordStaff->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function Terms(){
    	return view('api.mobile.Terms');
    }
	public function Terms_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['Year' => $value->year,'ItemB'=> $value->itemb,
					 'ItemL'     		 	 => $value->iteml, 				  'Item' 		=> $value->item,'Content' => $value->content , 
					 'Fine'       		     => $value->fine ,				  'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$Terms=new Terms;
					$Terms->insert($insert);
					return 'success';
				}else{
					return 'failed';
				}
			}
		}
		return 'failed';
	}
	public function File(){
    	return view('api.mobile.file');
    }
	public function File_Upload(Request $req){

		$res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        $files = $req->file('file');
        //
    	if(!empty($files)){
	        foreach($files as $file){
	        	try{
	        		//Storage::put($file->getClientOriginalName(), file_get_contents($file));
	            	$file->move('uploads', $file->getClientOriginalName());
		        }catch (Exception $e){
		            $res->status_code = 1;
		            $res->message = "failed";
		        }
	        }
	        return json_encode($res);
        }else{
        	$res->status_code = 1;
            $res->message = "failed";
        	return json_encode($res);
        }	
	}
	
}
