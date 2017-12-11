<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\CheckRecord;
use App\CheckRecordItem;
use App\CheckRecordItemProof;

use App\Inspection;
use App\InspectionCheckItem;
use App\InspectionSpec;

use App\Contractor;
use App\ContractorProject;
use App\ContractorStaff;

use App\PowerPlantDep;
use App\PowerPlantNews;
use App\PowerPlantStaff;

use App\Terms;

class CharController extends Controller
{
    //
    function array_group_by($array, $key) {
        $return = array();
        foreach($array as $val) {
            $return[$val[$key]][] = $val;
        }
        return $return;
    }
    public function index()
    {
        return view('char.index');
    }
    public function ListViolationRecord_bar(){
        $InspectionCheckItem=InspectionCheckItem::selectRaw('TermsID, count(TermsID) as sum')->whereNotNull('TermsID')->groupBy('TermsID')->get();

        $data= array('InspectionCheckItems' => $InspectionCheckItem);
        return view ('char.ListViolationRecord',$data);
    }
    public function EngineerSafetyViolationRank_bar(){
        

        $InspectionCheckItems=InspectionCheckItem::selectRaw('TermsID, count(TermsID) as sum')->whereNotNull('TermsID')->groupBy('TermsID')->get();
        $data=array (
            1 => array("item" => "墜落", "sum" => 0, "fine" => 0),
            2 => array("item" => "感電", "sum" => 0, "fine" => 0),
            3 => array("item" => "火災及爆炸", "sum" => 0, "fine" => 0),
            4 => array("item" => "中毒及缺氧", "sum" => 0, "fine" => 0),
            5 => array("item" => "發生職業災害及重大違規", "sum" => 0, "fine" => 0),
            6 => array("item" => "其他", "sum" => 0, "fine" => 0),
        );
        foreach ( $InspectionCheckItems as $InspectionCheckItem){
            if(strcasecmp($InspectionCheckItem->Terms->ItemB,"墜落") == 0){
                $data[1]["sum"]+=$InspectionCheckItem->sum;
                $data[1]["fine"]+=$InspectionCheckItem->Terms->Fine;
            }else if(strcasecmp($InspectionCheckItem->Terms->ItemB,"感電")== 0){
                $data[2]["sum"]+=$InspectionCheckItem->sum;
                $data[2]["fine"]+=$InspectionCheckItem->Terms->Fine;
            }else if(strcasecmp($InspectionCheckItem->Terms->ItemB,"火災及爆炸")== 0){
                $data[3]['sum']+=$InspectionCheckItem->sum;
                $data[3]['fine']+=$InspectionCheckItem->Terms->Fine;
            }else if(strcasecmp($InspectionCheckItem->Terms->ItemB,"中毒及缺氧")== 0){
                $data[4]['sum']+=$InspectionCheckItem->sum;
                $data[4]['fine']+=$InspectionCheckItem->Terms->Fine;
            }else if(strcasecmp($InspectionCheckItem->Terms->ItemB,"發生職業災害及重大違規")== 0){
                $data[5]['sum']+=$InspectionCheckItem->sum;
                $data[5]['fine']+=$InspectionCheckItem->Terms->Fine;
            }else if(strcasecmp($InspectionCheckItem->Terms->ItemB,"其他")== 0){
                $data[6]['sum']+=$InspectionCheckItem->sum;
                $data[6]['fine']+=$InspectionCheckItem->Terms->Fine;
            }else{
                //$data[5]['sum']+=$InspectionCheckItem->sum;
            }
        }
        $Top10s=InspectionCheckItem::groupBy('TermsID')->selectRaw('TermsID, count(TermsID) as sum')->whereNotNull('TermsID')->orderByRaw('count(TermsID) desc')->offset(0)->limit(10)->get();
        //return $data;
        //$data= array('ListViolationRecode' => $data);
        return view ('char.EngineerSafetyViolationRank',array('datas' =>  $data,'Top10s' => $Top10s));
    }
    public function ContractorViolationRecord_bar(){
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
                'CompanyName' => '',
                'Fine' => 0,
                'sum' => 0,
                'Total' => 0,
            );
            foreach ($data1 as $data) {
                 $list['CompanyName']=$data['CompanyName'];
                 $list['Fine']+=$data['Fine'];
                 $list['sum']+=$data['sum'];
                 $list['Total']+=$data['Total'];
            }
            array_push($Company,$list);
        }
        
        //return var_dump($Company);
        //return $Company;

       // return $this->array_group_by($datas,'CompanyName');
        
       // return $data;

    	return view ('char.ContractorViolationRecord',array('datas' =>  $Company));
    }
    public function ContractorViolationRank_bar(){
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
                'CompanyName' => '',
                'Fine' => 0,
                'sum' => 0,
                'Total' => 0,
            );
            foreach ($data1 as $data) {
                 $list['CompanyName']=$data['CompanyName'];
                 $list['Fine']+=$data['Fine'];
                 $list['sum']+=$data['sum'];
                 $list['Total']+=$data['Total'];
            }
            array_push($Company,$list);
        }
        return view ('char.ContractorViolationRank',array('datas' =>  $Company));
    }
    public function DepartmentViolationRank_bar(){
//select substring([InspectionWorkNumber],12,3) as PowerPlantStaffid,count(*) as sum from [inspection_check_items] group by substring(InspectionWorkNumber,12,3)
         //$InspectionCheckItem=InspectionCheckItem::selectRaw('substring([InspectionWorkNumber],12,3) as PowerPlantStaffid,count(*) as sum')->groupBy(InspectionCheckItem::raw("substring(InspectionWorkNumber,12,3)"))->get();

        $InspectionCheckItems=DB::table('inspection_check_items')
                     ->select(DB::raw('substring([InspectionWorkNumber],12,4) as PowerPlantStaffid,count(*) as sum'))
                     ->groupBy(DB::raw('substring(InspectionWorkNumber,12,4)'))
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
                'PowerPlantDep' => '',
                'sum' => 0
            );
            foreach ($data1 as $data) {
                 $list['PowerPlantDep']=$data['PowerPlantDep'];
                 $list['sum']+=$data['sum'];
            }
            array_push($Company,$list);
        }

        return view ('char.DepartmentViolationRank',array('datas' =>  $Company));
    }
}
