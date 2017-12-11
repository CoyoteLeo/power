<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
Use Redirect;


//這個控制器特色就是專門控制所有的資料庫的新刪修選。
class ManageController extends Controller{
    public function index(){
      return view('manage.index');
    }


    //電廠-資料庫
    public function PowerPlantDep(){;
        $PowerPlantDeps = PowerPlantDep::all();
        $data= array('PowerPlantDeps' => $PowerPlantDeps );
        return view('manage.PowerPlantDep', $data);
    }
    public function PowerPlantDep_insert(Request $req){
        $PowerPlantDep=new PowerPlantDep;
        $PowerPlantDep->Dep    = $req->input('Dep');
        $PowerPlantDep->Class  = $req->input('Class');
        $PowerPlantDep->save();
        return Redirect::route('PowerPlantDep.index');
    }
    public function PowerPlantDep_update(Request $req){
        $PowerPlantDep=PowerPlantDep::find($req->input('id'));
        $PowerPlantDep->Dep        =$req->input('Dep');
        $PowerPlantDep->Class      =$req->input('Class');
        $PowerPlantDep->save();
        return Redirect::route('PowerPlantDep.index');
    }
    public function PowerPlantDep_delete($id){
        PowerPlantDep::find($id)->delete();
        return Redirect::route('PowerPlantDep.index');
    }
    public function PowerPlantDep_edit($id){
        $PowerPlantDeps =PowerPlantDep::find($id);
        return view('manage.edit.PowerPlantDep', array('PowerPlantDeps' => $PowerPlantDeps));
    }

    //電廠最新消息-資料庫
    public function PowerPlantNews(){
        $PowerPlantDeps   = PowerPlantDep::all();
        $PowerPlantStaffs = PowerPlantStaff::all();
        $PowerPlantNews   = PowerPlantNews::all();
        $data= array('PowerPlantDeps' => $PowerPlantDeps,'PowerPlantStaffs' => $PowerPlantStaffs,'PowerPlantNews' => $PowerPlantNews);
        return view('manage.PowerPlantNews', $data);
    }
    public function PowerPlantNews_insert(Request $req){
        $dt = new DateTime();
        //return $dt->format('Y-m-d H:m:s');
        $PowerPlantNews=new PowerPlantNews;
        $PowerPlantNews->Titile               = $req->input('Title');
        $PowerPlantNews->Content              = $req->input('Content');
        //時間
        //$date = date('Y-m-d H:i:s',strtotime($req->input('Date').' '.$req->input('Time')));
        $PowerPlantNews->Date                 = $dt->format('Y-m-d H:m:s');;
        $PowerPlantNews->PowerPlantStaffId    = Auth::guard('power_plant_staffs')->user()->id;
        $PowerPlantNews->PowerPlantDepId      = $req->input('PowerPlantDepId');
        $PowerPlantNews->save();
        return Redirect::route('PowerPlantNews.index');
    }
    public function PowerPlantNews_update(Request $req){
        $PowerPlantNews=PowerPlantNews::find ($req->input('id'));
        $PowerPlantNews->Titile               = $req->input('Titile');
        $PowerPlantNews->Content              = $req->input('Content');
        //時間
        $date = date('Y-m-d H:i:s',strtotime($req->input('Date').' '.$req->input('Time')));
        $PowerPlantNews->Date                 = $date;
        $PowerPlantNews->PowerPlantStaffId    = $req->input('PowerPlantStaffId');
        $PowerPlantNews->PowerPlantDepId      = $req->input('PowerPlantDepId');
        $PowerPlantNews->save();

        //return $date;
        return Redirect::route('PowerPlantNews.index');
    }
    public function PowerPlantNews_delete($id){

        PowerPlantNews::find($id)->delete();
        return Redirect::route('PowerPlantNews.index');
    }
    public function PowerPlantNews_edit($id){
        $PowerPlantDeps   = PowerPlantDep::all();
        $PowerPlantStaffs = PowerPlantStaff::all();
        $PowerPlantNews=PowerPlantNews::find($id);
        $data= array('PowerPlantDeps' => $PowerPlantDeps,'PowerPlantStaffs' => $PowerPlantStaffs,'PowerPlantNews' => $PowerPlantNews);
        return view('manage.edit.PowerPlantNews',$data);
    }

    //電廠員工-資料庫
    public function PowerPlantStaff(){
        $PowerPlantDeps = PowerPlantDep::all();
        $PowerPlantStaffs = PowerPlantStaff::all();
        $data= array('PowerPlantDeps' => $PowerPlantDeps ,'PowerPlantStaffs' => $PowerPlantStaffs );
        return view('manage.PowerPlantStaff',$data);
    }
    public function PowerPlantStaff_insert(Request $req){

        $PowerPlantStaffs=new PowerPlantStaff;
        $PowerPlantStaffs->PowerPlantDepID    = $req->input('PowerPlantDepID');
        $PowerPlantStaffs->PID                = $req->input('PID');
        $PowerPlantStaffs->Name               = $req->input('Name');
        $PowerPlantStaffs->password           = $req->input('password');
        //$PowerPlantStaffs->password           = bcrypt( $req->input('password'));
        $PowerPlantStaffs->Titile             = $req->input('Titile');
        $PowerPlantStaffs->Email              = $req->input('Email');
        $PowerPlantStaffs->save();
        return Redirect::route('PowerPlantStaff.index');
    }
    public function PowerPlantStaff_update(Request $req){
        $PowerPlantStaffs=PowerPlantStaff::find($req->input('id'));
        $PowerPlantStaffs->PowerPlantDepID      = $req->input('PowerPlantDepID');
        $PowerPlantStaffs->PID                  = $req->input('PID');
        $PowerPlantStaffs->Name                 = $req->input('Name');
        //$PowerPlantStaffs->password             = bcrypt($req->input('password'));
        $PowerPlantStaffs->password             = $req->input('password');
        $PowerPlantStaffs->Titile               = $req->input('Titile');
        $PowerPlantStaffs->Email                = $req->input('Email');
        $PowerPlantStaffs->save();
        return Redirect::route('PowerPlantStaff.index');
    }
    public function PowerPlantStaff_delete($id){
        PowerPlantStaff::find($id)->delete();
        return Redirect::route('PowerPlantStaff.index');
    }
    public function PowerPlantStaff_edit($id){
        $PowerPlantDeps = PowerPlantDep::all();
        $PowerPlantStaffs = PowerPlantStaff::find($id);
        $data= array('PowerPlantDeps' => $PowerPlantDeps ,'PowerPlantStaffs' => $PowerPlantStaffs );
        return view('manage.edit.PowerPlantStaff',$data);
    }

    //承攬商-資料庫
    public function Contractor(){
        $Contractors = Contractor::all();
        return view('manage.Contractor', array('Contractors' => $Contractors));
    }
    public function Contractor_insert(Request $req){
        $Contractor              = new Contractor;
        $Contractor->CompanyName =$req->input('CompanyName');
        $Contractor->CompanyId   =$req->input('CompanyId');
        $Contractor->save();
        return Redirect::route('Contractor.index');
    }
    public function Contractor_update(Request $req){
        $Contractor              = Contractor::find($req->input('id'));
        $Contractor->CompanyName =$req->input('CompanyName');
        $Contractor->CompanyId   =$req->input('CompanyId');
        $Contractor->save();
        return Redirect::route('Contractor.index');
    }
    public function Contractor_delete($id){
        Contractor::find($id)->delete();
        return Redirect::route('Contractor.index');
    }
    public function Contractor_edit($id){
        $Contractors=Contractor::find($id);
        return view('manage.edit.Contractor', array('Contractors' => $Contractors));
    }

    //承攬商專案-資料庫
    public function ContractorProject(){
        $Contractor         = Contractor::all();
        $ContractorProjects = ContractorProject::all();
        $PowerPlantDeps      = PowerPlantDep::all();
        $PowerPlantStaffs    = PowerPlantStaff::all();
        $data= array('ContractorProjects' => $ContractorProjects, 'Contractors'=> $Contractor,'PowerPlantDeps' =>$PowerPlantDeps , 'PowerPlantStaffs' => $PowerPlantStaffs );
        return view('manage.ContractorProject',$data);
    }
    public function ContractorProject_insert(Request $req){
        $ContractorProject=new ContractorProject;
        $ContractorProject->contractorId           =$req->input('contractorId');
        $ContractorProject->name                   =$req->input('name');
        $ContractorProject->StartDate              =$req->input('StartDate');
        $ContractorProject->EndDate                =$req->input('EndDate');
        $ContractorProject->Year                   =$req->input('Year');
        $ContractorProject->PowerPlantDepID        =$req->input('PowerPlantDepID');
        $ContractorProject->PowerPlantStaffID      =$req->input('PowerPlantStaffID');
        $ContractorProject->save();
        return Redirect::route('ContractorProject.index');
    }
    public function ContractorProject_update(Request $req){
        $ContractorProject=ContractorProject::find($req->input('id'));
        $ContractorProject->contractorId            =$req->input('contractorId');
        $ContractorProject->name                    =$req->input('name');
        $ContractorProject->StartDate               =$req->input('StartDate');
        $ContractorProject->EndDate                 =$req->input('EndDate');
        $ContractorProject->Year                    =$req->input('Year');
        $ContractorProject->PowerPlantDepID         =$req->input('PowerPlantDepID');
        $ContractorProject->PowerPlantStaffID       =$req->input('PowerPlantStaffID');
        $ContractorProject->save();
        return Redirect::route('ContractorProject.index');
    }
    public function ContractorProject_delete($id){
        ContractorProject::find($id)->delete();
        return Redirect::route('ContractorProject.index');
    }
    public function ContractorProject_edit($id){
        $Contractor         = Contractor::all();
        $ContractorProjects = ContractorProject::find($id);
        $PowerPlantDeps      = PowerPlantDep::all();
        $PowerPlantStaffs    = PowerPlantStaff::all();
        $data= array('ContractorProjects' => $ContractorProjects, 'Contractors'=> $Contractor,'PowerPlantDeps' =>$PowerPlantDeps , 'PowerPlantStaffs' => $PowerPlantStaffs );
        return view('manage.edit.ContractorProject',$data);
    }

    //承攬商員工-資料庫
    public function ContractorStaff(){
        $ContractorStaffs = ContractorStaff::all();
        $Contractors = Contractor::all();
        $data= array('ContractorStaffs' => $ContractorStaffs, 'Contractors'=> $Contractors);
        return view('manage.ContractorStaff', $data);
    }
    public function ContractorStaff_insert(Request $req){
        $ContractorStaff=new ContractorStaff;
        $ContractorStaff->contractorId=$req->input('Contractor');
        $ContractorStaff->PID         =$req->input('PID');
        $ContractorStaff->Name        =$req->input('Name');
        $ContractorStaff->Titile      =$req->input('Titile');
        $ContractorStaff->save();
        return Redirect::route('ContractorStaff.index');
    }
    public function ContractorStaff_update(Request $req){
        $ContractorStaff=ContractorStaff::find($req->input('id'));
        $ContractorStaff->contractorId          =$req->input('Contractor');
        $ContractorStaff->PID                   =$req->input('PID');
        $ContractorStaff->Name                  =$req->input('Name');
        $ContractorStaff->Titile                =$req->input('Titile');
        $ContractorStaff->save();
        return Redirect::route('ContractorStaff.index');
    }
    public function ContractorStaff_delete($id){
        ContractorStaff::find($id)->delete();
        return Redirect::route('ContractorStaff.index');
    }
    public function ContractorStaff_edit($id){
        $ContractorStaffs = ContractorStaff::find($id);
        $Contractors = Contractor::all();
        $data= array('ContractorStaffs' => $ContractorStaffs, 'Contractors'=> $Contractors);
        return view('manage.edit.ContractorStaff', $data);
    }

    //查核紀錄-資料庫
    public function CheckRecord(){
        $CheckRecord = CheckRecord::all();
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'CheckRecords'=>$CheckRecord);
        return view('manage.CheckRecord', $data);
    }
    public function CheckRecord_insert(Request $req){
        $CheckRecord=new CheckRecord;
        $CheckRecord->Date                    =$req->input('Date');
        $CheckRecord->Time                    =$req->input('Time');
        $CheckRecord->CheckRecordWorkNumber   ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
        $CheckRecord->PowerPlantStaffID       =$req->input('PowerPlantStaffID');
        $CheckRecord->save();
        return Redirect::route('CheckRecord.index');
    }
    public function CheckRecord_update(Request $req){
        $CheckRecord=CheckRecord::find($req->input('id'));
        $CheckRecord->Date                    =$req->input('Date');
        $CheckRecord->Time                    =$req->input('Time');
        $CheckRecord->CheckRecordWorkNumber   ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
        $CheckRecord->PowerPlantStaffID       =$req->input('PowerPlantStaffID');
        $CheckRecord->save();
        return Redirect::route('CheckRecord.index');
    }
    public function CheckRecord_delete($id){
        CheckRecord::find($id)->delete();
        return Redirect::route('CheckRecord.index');
    }
    public function CheckRecord_edit($id){
        $CheckRecord=CheckRecord::find($id);
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'CheckRecords'=>$CheckRecord);
        return view('manage.edit.CheckRecord', $data);
    }


    //查核紀錄項目-資料庫
    public function CheckRecordItem(){
        $CheckRecordItem = CheckRecordItem::all();
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'CheckRecordItems'=>$CheckRecordItem);
        return view('manage.CheckRecordItem',$data);
    }
    public function CheckRecordItem_update(Request $req){
        $CheckRecordItem = CheckRecordItem::find($req->input('id')) ;
        $CheckRecordItem->Area            =$req->input('Area');
        $CheckRecordItem->Content         =$req->input('Content');
        $CheckRecordItem->save();
        return Redirect::route('CheckRecordItem.index');
    }
    public function CheckRecordItem_insert(Request $req){
        $CheckRecordItem = new CheckRecordItem;
        $CheckRecordItem->CheckWorkNumber ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
        $CheckRecordItem->Index           =1;
        //$CheckRecordItem->Index           =date("Ymd").$req->input('PowerPlantStaffID');
        $CheckRecordItem->PowerPlantStaffId =$req->input('PowerPlantStaffId');
        $CheckRecordItem->Area            =$req->input('Area');
        $CheckRecordItem->Content         =$req->input('Content');
        $CheckRecordItem->save();
        return Redirect::route('CheckRecordItem.index');
    }
    public function CheckRecordItem_delete($id){
        CheckRecordItem::find($id)->delete();
        return Redirect::route('CheckRecordItem.index');
    }
    public function CheckRecordItem_edit($id){
        $CheckRecordItem = CheckRecordItem::find($id);
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'CheckRecordItems'=>$CheckRecordItem);
        return view('manage.edit.CheckRecordItem',$data);
    }

    //查核紀錄佐證資料-資料庫
    public function CheckRecordItemProof(){
        $CheckRecordItemProofs= CheckRecordItemProof::all();
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'CheckRecordItemProofs'=>$CheckRecordItemProofs);
        return view('manage.CheckRecordItemProof', $data);
    }
    public function CheckRecordItemProof_insert(Request $req){
        //Request $req
        if(Input::hasFile('file')){
            echo 'Uploaded';
            $CheckRecordItemProof=new CheckRecordItemProof;
            $CheckRecordItemProof->CheckRecordWorkNumber ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
            $CheckRecordItemProof->CheckRecordIndex      =1;
            $CheckRecordItemProof->Index                 =1;
            $file = Input::file('file');
            //$CheckRecordItemProof->Path                  =$file->getRealPath();
            $CheckRecordItemProof->Path                  ='\uploads';
            $file->move('uploads', 'CRW'.date("YmdHi").$req->input('PowerPlantStaffID').".".$file->getClientOriginalExtension());
            $CheckRecordItemProof->Type                  =$file->getClientOriginalExtension();
            $CheckRecordItemProof->FileName              ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
            $CheckRecordItemProof->save();
            return Redirect::route('CheckRecordItemProof.index');
        } 
    }
    public function CheckRecordItemProof_update(Request $req){
        $CheckRecordItemProof=CheckRecordItemProof::find($req->input('id'));
        $CheckRecordItemProof->FileName              =$req->input('FileName');
        $CheckRecordItemProof->Path                  =$req->input('Path');
        $CheckRecordItemProof->Type                  =$req->input('Type');
        $CheckRecordItemProof->save();
        return Redirect::route('CheckRecordItemProof.index');
    }
    public function CheckRecordItemProof_delete($id){
        $delete=CheckRecordItemProof::find($id);
        $file_path ="C:\\xampp\htdocs\\power\public\uploads\\".$delete->FileName.".".$delete->Type;
        File::delete($file_path);
        //return  $file_path;
        CheckRecordItemProof::find($id)->delete();
        return Redirect::route('CheckRecordItemProof.index');
    }
    public function CheckRecordItemProof_edit($id){
        $CheckRecordItemProofs= CheckRecordItemProof::find($id);
        $PowerPlantStaffs= PowerPlantStaff::all();

        $data= array('PowerPlantStaffs' => $PowerPlantStaffs , 'CheckRecordItemProof'=> $CheckRecordItemProofs);
        return view('manage.edit.CheckRecordItemProof', $data);
    }
    public function CheckRecordStaff(){
        $CheckRecordStaff=CheckRecordStaff::all();
        $PowerPlantStaffs=PowerPlantStaff::all();
        $data=array('CheckRecordStaffs' =>  $CheckRecordStaff , 'PowerPlantStaffs'=> $PowerPlantStaffs);
        return view('manage.CheckRecordStaff', $data);
    }
    public function CheckRecordStaff_insert(Request $req){
        $CheckRecordStaff=new CheckRecordStaff;
        $CheckRecordStaff->CheckRecordWorkNumber   ='CRW'.date("Ymd").$req->input('PowerPlantStaffID');
        $CheckRecordStaff->PowerPlantStaffID       =$req->input('PowerPlantStaffID');
        $CheckRecordStaff->save();
        return Redirect::route('CheckRecordStaff.index');
    }
    public function CheckRecordStaff_update(Request $req){
        $CheckRecordStaff=CheckRecordStaff::find($req->input('id'));
        $data=array('CheckRecordStaffs' =>  $CheckRecordStaff);
        return Redirect::route('CheckRecordStaff.index');;
    }
    public function CheckRecordStaff_delete(Request $req){
        $CheckRecordStaff=CheckRecordStaff::find($req->input('id'));
        $data=array('CheckRecordStaffs' =>  $CheckRecordStaff);
        return Redirect::route('CheckRecordStaff.index');;
    }

    //查巡查核-資料庫
    public function Inspection(){
        $ContractorProject= ContractorProject::all();
        $Inspection = Inspection::all();
        $PowerPlantStaffs =PowerPlantStaff::all();
        $data= array('Inspections' =>  $Inspection,'ContractorProjects' => $ContractorProject, 'PowerPlantStaffs' => $PowerPlantStaffs);
        return view('manage.Inspection', $data);
    }
    public function Inspection_insert(Request $req){
        $InspectionSpec=new Inspection;
        $InspectionSpec->Date                 =$req->input('Date');
        $InspectionSpec->Time                 =$req->input('Time');
        $InspectionSpec->ContractorProjectID  =$req->input('ContractorProjectID');
        $InspectionSpec->InspectionWorkNumber ='IRT'.date("Ymd").$req->input('PowerPlantStaffID');
        $InspectionSpec->save();
        return Redirect::route('Inspection.index');
    }
    public function Inspection_update(Request $req){
        $InspectionSpec=Inspection::find($req->input('id'));
        $InspectionSpec->Date                 =$req->input('Date');
        $InspectionSpec->Time                 =$req->input('Time');
        $InspectionSpec->ContractorProjectID  =$req->input('ContractorProjectID');
        $InspectionSpec->save();
        return Redirect::route('Inspection.index');
    }
    public function Inspection_delete($id){
        Inspection::find($id)->delete();
        return Redirect::route('Inspection.index');
    }
    public function Inspection_edit($id){
        $ContractorProject= ContractorProject::all();
        $Inspection = Inspection::find($id);
        $data= array('Inspections' =>  $Inspection,'ContractorProjects' => $ContractorProject);
        return view('manage.edit.Inspection', $data);
    }
    //查巡查核項目規格-資料庫
    public function InspectionSpec(){
        $InspectionSpec = InspectionSpec::all();
        return view('manage.InspectionSpec', array('InspectionSpecs' => $InspectionSpec));
    }
    public function InspectionSpec_insert(Request $req){
        $InspectionSpec=new InspectionSpec;
        $InspectionSpec->Year  =$req->input('Year');
        $InspectionSpec->ItemB =$req->input('ItemB');
        $InspectionSpec->ItemL =$req->input('ItemL');
        $InspectionSpec->Item  =$req->input('Item');
        $InspectionSpec->save();
        return Redirect::route('InspectionSpec.index');
    }
    public function InspectionSpec_update(Request $req){
        $InspectionSpec=InspectionSpec::find($req->input('id'));
        $InspectionSpec->Year                 =$req->input('Year');
        $InspectionSpec->ItemB                =$req->input('ItemB');
        $InspectionSpec->ItemL                =$req->input('ItemL');
        $InspectionSpec->Item                 =$req->input('Item');
        $InspectionSpec->save();
        return Redirect::route('InspectionSpec.index');
    }
    public function InspectionSpec_delete($id){
        InspectionSpec::find($id)->delete();
        return Redirect::route('InspectionSpec.index');
    }
    public function InspectionSpec_edit($id){
        $InspectionSpec = InspectionSpec::find($id);
        return view('manage.edit.InspectionSpec', array('InspectionSpecs' => $InspectionSpec));
    }

    //查巡查核項目-資料庫
    public function InspectionCheckItem(){
        $Terms= Terms::all();
        $InspectionSpecs=InspectionSpec::all();
        $InspectionCheckItems= InspectionCheckItem::all();
        $PowerPlantStaffs =PowerPlantStaff::all();
        $data = array('Terms' => $Terms, 'InspectionSpecs' => $InspectionSpecs,
                      'InspectionCheckItems' => $InspectionCheckItems,
                      'PowerPlantStaffs' => $PowerPlantStaffs);
        return view('manage.InspectionCheckItem', $data);
    }
    public function InspectionCheckItem_insert(Request $req){
        $InspectionCheckItem=new InspectionCheckItem;
        $InspectionCheckItem->InspectionWorkNumber ='IRT'.date("Ymd").$req->input('PowerPlantStaffID');
        $InspectionCheckItem->InspectionItemSpecID =$req->input('InspectionItemSpecID');
        $InspectionCheckItem->Type                 =$req->input('Type');
        $InspectionCheckItem->TermsID              =$req->input('TermsID');
        $InspectionCheckItem->Remark               =$req->input('Remark');
        $InspectionCheckItem->save();
        return Redirect::route('InspectionCheckItem.index');
    }
    public function InspectionCheckItem_delete($id){
        InspectionCheckItem::find($id)->delete();
        return Redirect::route('InspectionCheckItem.index');
    }
    public function InspectionCheckItemProof(){
        $InspectionSpecs=InspectionSpec::all();
        $InspectionCheckItemProof= InspectionCheckItemProof::all();
        $PowerPlantStaffs= PowerPlantStaff::all();

        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'InspectionCheckItemProofs'=>$InspectionCheckItemProof,
                     'InspectionSpecs' => $InspectionSpecs
                    );
        return view('manage.InspectionCheckItemProof', $data);
    }
    public function InspectionCheckItemProof_insert(Request $req){
        //Request $req
        if(Input::hasFile('file')){
            $InspectionCheckItemProof=new InspectionCheckItemProof;
            $InspectionCheckItemProof->InspectionWorkNumber ='IPT'.date("Ymd").$req->input('PowerPlantStaffID');
            $InspectionCheckItemProof->InspectionItemSpecID      =$req->input('InspectionItemSpecID');
            $file = Input::file('file');
            //$InspectionCheckItemProof->Path                  =$file->getRealPath();
            $InspectionCheckItemProof->Path                  ='\uploads';
            $file->move('uploads', 'IPT'.date("YmdHi").$req->input('PowerPlantStaffID').".".$file->getClientOriginalExtension());
            $InspectionCheckItemProof->Type                  =$file->getClientOriginalExtension();
            $InspectionCheckItemProof->FileName              ='IPT'.date("Ymd").$req->input('PowerPlantStaffID');
            $InspectionCheckItemProof->save();
            return Redirect::route('InspectionCheckItemProof.index');
        } 
    }
    public function InspectionCheckItemProof_update(Request $req){
        $InspectionCheckItemProof=InspectionCheckItemProof::find($req->input('id'));
        $InspectionCheckItemProof->FileName              =$req->input('FileName');
        $InspectionCheckItemProof->Path                  =$req->input('Path');
        $InspectionCheckItemProof->Type                  =$req->input('Type');
        $InspectionCheckItemProof->save();
        return Redirect::route('InspectionCheckItemProof.index');
    }
    public function InspectionCheckItemProof_delete($id){
        $delete=InspectionCheckItemProof::find($id);
        $file_path ="C:\\xampp\htdocs\\power\public\uploads\\".$delete->FileName.".".$delete->Type;
        File::delete($file_path);
        //return  $file_path;
        InspectionCheckItemProof::find($id)->delete();
        return Redirect::route('InspectionCheckItemProof.index');
    }
    public function InspectionCheckItemProof_edit($id){
        $InspectionCheckItemProof= InspectionCheckItemProof::find($id);
        $PowerPlantStaffs= PowerPlantStaff::all();
        $data= array('PowerPlantStaffs' => $PowerPlantStaffs, 'InspectionCheckItemProof'=>$InspectionCheckItemProof);
        return view('manage.edit.InspectionCheckItemProof', $data);
    }
    /*

    
    
    
    


    */
    //安全條款
    public function Terms(){
        $Terms= Terms::all();
        return view('manage.Terms', array('Terms' => $Terms));
    }
    public function Terms_insert(Request $req){
        $terms=new Terms;
        $terms->Year     =$req->input('Year');
        $terms->ItemB    =$req->input('ItemB');
        $terms->ItemL    =$req->input('ItemL');
        $terms->Item     =$req->input('Item');
        $terms->Content  =$req->input('Content');
        $terms->Fine     =$req->input('Fine');
        $terms->save();
        return Redirect::route('Terms.index');
    }
    public function Terms_update(Request $req){
        $terms=Terms::find($req->input('id'));
        $terms->Year      =$req->input('Year');
        $terms->ItemB     =$req->input('ItemB');
        $terms->ItemL     =$req->input('ItemL');
        $terms->Item      =$req->input('Item');
        $terms->Content   =$req->input('Content');
        $terms->Fine      =$req->input('Fine');
        $terms->save();
        return Redirect::route('Terms.index');
    }
    public function Terms_delete($id){
        Terms::find($id)->delete();
        return Redirect::route('Terms.index');
    }
    public function Terms_edit($id){
        $terms=Terms::find($id);
        return view('manage.edit.Terms', array('Terms' => $terms));
    }
}
