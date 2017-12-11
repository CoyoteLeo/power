<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
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

use App\OperationSpecCategory;
use App\OperationSpecType;
use App\OperationSpecItem;

class CsvController extends Controller
{

    public function index(){
    	return view('api.csv.index');
    }
    function array_group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
	//上傳組
	//PowerPlantDep
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
	}
	public function PowerPlantStaff_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['PID' 			   => $value->pid, 			   'Name' 	  => $value->name,  'Password' => $value->password, 'remember_token' => $value->remember_token , 
					 'PowerPlantDepID' => $value->powerplantdepid ,'Titile'   => $value->titile,'Email'    => $value->email,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$PowerPlantStaff=new PowerPlantStaff;
					$PowerPlantStaff->insert($insert);
				}
			}
		}
		return back();
	}
	//Contractor
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
	}
	//inspection
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
	}
	public function InspectionSpec_Upload(){
		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['Year'  => $value->year,'ItemB'=>$value->itemb,'ItemL' => $value->iteml, 'Item' => $value->item ];
				}

				if(!empty($insert)){
					$InspectionSpec=new InspectionSpec;
					$InspectionSpec->insert($insert);
				}
			}
		}
		return back();
	}
	//checkrecord
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
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
				}
			}
		}
		return back();
	}
	public function OperationSpecCategory_Upload(){
	    if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['OperationSpecTypeID' =>$value->operationspectypeid,'Name' => $value->name,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$Terms=new OperationSpecCategory;
					$Terms->insert($insert);
				}
			}
		}
		return back();
	}
	public function OperationSpecItem_Upload(){
	    if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {

					$insert[] = 
					['Year' => $value->year,'OperationSpecCategoryID' => $value->operationspeccategoryid,'Name' => $value->name,
					 'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}
				//return $$data;
				if(!empty($insert)){
					$Terms=new OperationSpecItem;
					$Terms->insert($insert);
				}
			}
		}
		return back();
	}
	public function OperationSpecType_Upload(){
	    if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = 
					['Name' => $value->name,'created_at' => $value->created_at , 'updated_at' => $value->updated_at];
				}

				if(!empty($insert)){
					$Terms=new OperationSpecType;
					$Terms->insert($insert);
				}
			}
		}
		return back();
	}
	//上傳組 End
	//下載組
	//Check
	public function CheckRecord_Donwload(){
	    $data = CheckRecord::get()->toArray();
	    return Excel::create('CheckRecord', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function CheckRecordItem_Donwload(){
	    $data = CheckRecordItem::get()->toArray();
	    return Excel::create('CheckRecordItem', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function CheckRecordItemProof_Donwload(){
	    $data = CheckRecordItemProof::get()->toArray();
	    return Excel::create('CheckRecordItemProof', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function CheckRecordStaff_Donwload(){
	    $data = CheckRecordStaff::get()->toArray();
	    return Excel::create('CheckRecordStaff', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	//Inspection
	public function Inspection_Donwload(){
	    $data = Inspection::get()->toArray();
	    return Excel::create('Inspection', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function InspectionCheckItem_Donwload(){
	    $data = InspectionCheckItem::get()->toArray();
	    return Excel::create('InspectionCheckItem', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function InspectionCheckItemProof_Donwload(){
	    $data = InspectionCheckItemProof::get()->toArray();
	    return Excel::create('InspectionCheckItemProof', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function InspectionSpec_Donwload(){
	    $data = InspectionSpec::get()->toArray();
	    return Excel::create('InspectionSpec', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	//Contractor
	public function Contractor_Donwload(){
	    $data = Contractor::get()->toArray();
	    return Excel::create('Contractor', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function ContractorProject_Donwload(){
	    $data = ContractorProject::get()->toArray();
	    return Excel::create('ContractorProject', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function ContractorStaff_Donwload(){
	    $data = ContractorStaff::get()->toArray();
	    return Excel::create('ContractorStaff', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	//PowerPlant
	public function PowerPlantDep_Donwload(){
	    $data = PowerPlantDep::get()->toArray();
	    return Excel::create('PowerPlantDep', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function PowerPlantNews_Donwload(){
	    $data = PowerPlantNews::get()->toArray();
	    return Excel::create('PowerPlantNews', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function PowerPlantStaff_Donwload(){
	    $data = PowerPlantStaff::get()->toArray();
	    //$data = ['name' => 'Desk', 'price' => 200];
        //$data = $data->toArray();
	    return Excel::create('PowerPlantStaff', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	//terms
	public function Terms_Donwload(){
	    $data = Terms::get()->toArray();
	    return Excel::create('Terms', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function OperationSpecCategory_Donwload(){
	    $data = OperationSpecCategory::get()->toArray();
	    return Excel::create('OperationSpecCategory', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	public function OperationSpecItem_Donwload(){
	    $data = OperationSpecItem::get()->toArray();
	    return Excel::create('OperationSpecItem', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}
	
	public function OperationSpecType_Donwload(){
	    $data = OperationSpecType::get()->toArray();
	    return Excel::create('OperationSpecType', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("csv");
	}

	//報表組合
	public function ContractorViolationRank_Donwload(){
	    $InspectionCheckItems=InspectionCheckItem::selectRaw('InspectionWorkNumber,TermsID, count(TermsID) as sum')->whereRaw('TermsID is not null
')->groupBy('InspectionWorkNumber')->groupBy('TermsID')->get();
        $datas=array();
        foreach ( $InspectionCheckItems as $InspectionCheckItem){
            $inspection=Inspection::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->first();
            $list= array(
                        'CompanyName' => $inspection->ContractorProject->Contractors->CompanyName,
                        'Fine' => $InspectionCheckItem->Terms->Fine,
                        'sum' => $InspectionCheckItem->sum,
                        'Total' => intval($InspectionCheckItem->sum)*intval($InspectionCheckItem->Terms->Fine),
                        );
            array_push($datas,$list);
        }
        $Company=array();
        //return var_dump($this->array_group_by($datas,'CompanyName'));
        foreach ($this->array_group_by($datas,'CompanyName') as $data1){
            $list= array(
                '公司名稱' => '',
                '違規次數' => 0,
                '罰金總和' => 0,
            );
            foreach ($data1 as $data) {
                 $list['公司名稱']=$data['CompanyName'];
                 $list['違規次數']+=$data['sum'];
                 $list['罰金總和']+=$data['Total'];
            }
            array_push($Company,$list);
        }
        $data=$Company;
	    return Excel::create('ContractorViolationRank', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("xls");
	}
	public function ListViolationRecode_Donwload(){

	    $InspectionCheckItems=InspectionCheckItem::selectRaw('InspectionWorkNumber,TermsID, count(TermsID) as sum')->whereRaw('TermsID is not null
')->groupBy('InspectionWorkNumber')->groupBy('TermsID')->get();
	    $data=array();
	    foreach ( $InspectionCheckItems as $InspectionCheckItem){
	    	$inspection=Inspection::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->first();
	    	$list= array(
	    				'承攬商廠商名稱' => $inspection->ContractorProject->Contractors->CompanyName,
	    				'專案編號' =>  $inspection->ContractorProject->name,
	    				'巡檢編號' => $InspectionCheckItem->InspectionWorkNumber,
	    		        '罰款項目' => $InspectionCheckItem->Terms->ItemB,
	    		        '罰款條目' => $InspectionCheckItem->Terms->ItemL,
	    		        '罰款金額' => $InspectionCheckItem->Terms->Fine,
	    		        '違規次數' => $InspectionCheckItem->sum,
	    		        '罰金總數' => intval($InspectionCheckItem->sum)*intval($InspectionCheckItem->Terms->Fine),
	    		        );
	    	array_push($data,$list);
	    }
	    //return $datas;
	    
	    return Excel::create('ListViolationRecode', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("xls");
	}
	public function ContractorViolationRecord_Donwload(){
		$InspectionCheckItems=InspectionCheckItem::selectRaw('InspectionWorkNumber,TermsID, count(TermsID) as sum')->whereRaw('TermsID is not null
')->groupBy('InspectionWorkNumber')->groupBy('TermsID')->get();
		dd($InspectionCheckItems);
        $datas=array();
        foreach ( $InspectionCheckItems as $InspectionCheckItem){
            $inspection=Inspection::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->first();
            $list= array(
                        'CompanyName' => $inspection->ContractorProject->Contractors->CompanyName,
                        'Fine' => $InspectionCheckItem->Terms->Fine,
                        'sum' => $InspectionCheckItem->sum,
                        'Total' => intval($InspectionCheckItem->sum)*intval($InspectionCheckItem->Terms->Fine),
                        );
            array_push($datas,$list);
        }
        $Company=array();
        //return var_dump($this->array_group_by($datas,'CompanyName'));
        foreach ($this->array_group_by($datas,'CompanyName') as $data1){
            $list= array(
                '公司名稱' => '',
                '違規次數總和' => 0,
                '罰金總和' => 0,
            );
            foreach ($data1 as $data) {
                 $list['公司名稱']=$data['CompanyName'];
                 $list['違規次數總和']+=$data['sum'];
                 $list['罰金總和']+=$data['Total'];
            }
            array_push($Company,$list);
        }
	    $data=$Company;
	    return Excel::create('ListViolationRecord', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("xls");
		
	}
	public function EngineerSafetyViolationRank_Donwload(){
	    $InspectionCheckItems= InspectionCheckItem::orderBy('TermsId', 'asc')->get();
	    $data=array();
	    foreach ( $InspectionCheckItems as $InspectionCheckItem){
	    	$inspection=Inspection::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->first();
	    	$list= array(
	    			    '承攬商廠商名稱' => $inspection->ContractorProject->Contractors->CompanyName,
	    				'專案編號' =>  $inspection->ContractorProject->name,
	    				'巡檢編號' => $InspectionCheckItem->InspectionWorkNumber,
	    		        '罰款項目' => $InspectionCheckItem->Terms->ItemB,
	    		        '罰款條目' => $InspectionCheckItem->Terms->ItemL,
	    		        '罰款'     => $InspectionCheckItem->Terms->Fine,
	    		        '創建時間' => $InspectionCheckItem->created_at
	    		        );
	    	array_push($data,$list);
	    }
	    //return $datas;
	    
	    return Excel::create('ListViolationRecode', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("xls");
	}
	public function DepartmentViolationRank_Donwload(){
		$InspectionCheckItems=DB::table('inspection_check_items')
                     ->select(DB::raw('substring([InspectionWorkNumber],12,3) as PowerPlantStaffid,count(*) as sum'))
                     ->groupBy(DB::raw('substring(InspectionWorkNumber,12,3)'))
                     ->get();
        $datas=array();
        foreach ( $InspectionCheckItems as $InspectionCheckItem){
            $PowerPlantStaff=PowerPlantStaff::find(intval($InspectionCheckItem->PowerPlantStaffid))->first();
            $list= array(
                'PowerPlantDep'  =>$PowerPlantStaff->PowerPlantDep->Dep,
                'PowerPlantStaffid'  =>intval($InspectionCheckItem->PowerPlantStaffid),
                'sum' => $InspectionCheckItem->sum,
            );
            array_push($datas,$list);
        }
        //return $datasl
        $Company=array();
        //return var_dump($this->array_group_by($datas,'CompanyName'));
        foreach ($this->array_group_by($datas,'PowerPlantDep') as $data1){
            $list= array(
                '負責部門' => '',
                '違規次數' => 0
            );
            foreach ($data1 as $data) {
                 $list['負責部門']=$data['PowerPlantDep'];
                 $list['違規次數']+=$data['sum'];
            }
            array_push($Company,$list);
        }

	    $data = $Company;
	    return Excel::create('DepartmentViolationRank', function($excel)use($data) {
			$excel->sheet('mySheet', function($sheet) use ($data){
				$sheet->fromArray($data);
		    });
		})->download("Xls");
	}
	//下載組 End


}
