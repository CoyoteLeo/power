<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

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

use App\Res;
use App\Terms;

use App\OperationSpecCategory;
use App\OperationSpecType;
use App\OperationSpecItem;
class JsonController extends Controller
{
    public function index(){
    	return view('api.json.index');
    }
    //CheckRecord
    public function CheckRecord_json(){
        $data = CheckRecord::get()->toArray();
        return response()->json($data);
    }
    public function CheckRecordItem_json(){
    	$data = CheckRecordItem::get()->toArray();
        return response()->json($data);
    }
    public function CheckRecordItemProof_json(){
    	$data = CheckRecordItemProof::get()->toArray();
        return response()->json($data);
    }
    //Inspection
    public function Inspection_json(){
    	$data = Inspection::get()->toArray();
        return response()->json($data);
    }
    public function InspectionCheckItem_json(){
    	$data = InspectionCheckItem::get()->toArray();
        return response()->json($data);
    }

    public function InspectionSpec_json(){
    	$data = InspectionSpec::get()->toArray();
        return response()->json($data);
    }
    //Contractor
    public function Contractor_json(){
    	$data = Contractor::get()->toArray();
        return response()->json($data);
    }

    public function ContractorProject_json(){
    	$data = ContractorProject::get()->toArray();
        return response()->json($data);
    }
    public function ContractorStaff_json(){
    	$data = ContractorStaff::get()->toArray();
        return response()->json($data);
    }
    //PowerPlant
    public function PowerPlantDep_json(){
    	$data = PowerPlantDep::get()->toArray();
        return response()->json($data);
    }
    public function PowerPlantNews_json(){
    	$data = PowerPlantNews::get()->toArray();
        return response()->json($data);
    }
    public function PowerPlantStaff_json(){
    	$data = PowerPlantStaff::get()->toArray();
        return response()->json($data);
    }
    //terms
    public function Terms_json(){
        $data = Terms::get()->toArray();
        return response()->json($data);
    }
    public function OperationSpecCategory_json(){
        $data = OperationSpecCategory::get()->toArray();
        return response()->json($data);
    }
    public function OperationSpecItem_json(){
        $data = OperationSpecItem::get()->toArray();
        return response()->json($data);
    }
    public function OperationSpecType_json(){
        $data = OperationSpecType::get()->toArray();
        return response()->json($data);
    }
    public function ContractorViolationRecode_json(){
        $data = Terms::get()->toArray();
        return response()->json($data);
    }
    public function ContractorViolationRank_json(){
        $data = Terms::get()->toArray();
        return response()->json($data);
    }
    public function ListViolationRecode_json(){
        $data = InspectionCheckItem::groupBy('TermsID')->selectRaw('TermsID as TermId, sum(TermsID) as 總和')->get();

        //return $data;
        return response()->json($data);
    }

    public function CheckRecord_json_from(){
        return view('api.json.checkrecord');
    }

    public function OperationSpecCategory_json_upload(Request $request){
          //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料
            $OperationSpecCategory=new OperationSpecCategory;
            $OperationSpecCategory->OperationSpecTypeID     =$data["OperationSpecTypeID"];
            $OperationSpecCategory->Name                    =$data["Name"];
            try{
                $OperationSpecCategory->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function OperationSpecType_json_upload(Request $request){
          //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料
            $OperationSpecCategory=new OperationSpecType;
            $OperationSpecCategory->Name=$data["Name"];
            try{
                $OperationSpecCategory->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function OperationSpecItem_json_upload(Request $request){
          //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";

        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料
            $OperationSpecItem=new OperationSpecItem;
            $OperationSpecItem->Year                =$data["Year"];
            $OperationSpecItem->OperationSpecCategoryID =$data["OperationSpecCategoryID"];


            $OperationSpecItem->Name  =$data["Name"];
            try{
                $OperationSpecItem->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function CheckRecord_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";

        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料

            $CheckRecord=new CheckRecord;
            $CheckRecord->Date                    =date("Y-m-d",strtotime($data["Date"]));
            $CheckRecord->Time                    =date("H:i:s",strtotime($data["Time"]));
            $CheckRecord->CheckRecordWorkNumber   =$data["CheckRecordWorkNumber"];
            $CheckRecord->PowerPlantStaffID       =$data["PowerPlantStaffID"];
            try{
                $CheckRecord->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function CheckRecordItem_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        /*foreach($request as $data){

        }*/
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            $CheckRecordItem = new CheckRecordItem;
            $CheckRecordItem->CheckWorkNumber =$data["CheckWorkNumber"];
            $CheckRecordItem->Index           =$data["Index"];
            //$CheckRecordItem->Index           =date("Ymd").$req->input('PowerPlantStaffID');
            $CheckRecordItem->PowerPlantStaffId=$data["PowerPlantStaffId"];
            $CheckRecordItem->Area            =$data["Area"];
            $CheckRecordItem->Content         =$data["Content"];
            try{
               $CheckRecordItem->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function CheckRecordItemProof_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        /*foreach($request as $data){

        }*/
        for($i = 0 ; $i< count($request);$i++){
                $data = $request[$i];
                //初始化回傳結果
                // 寫入申辦人資料
                $CheckRecordItemProof=new CheckRecordItemProof;
                $CheckRecordItemProof->CheckRecordWorkNumber =$data["CheckRecordWorkNumber"];
                $CheckRecordItemProof->CheckRecordIndex      =$data["CheckRecordIndex"];
                $CheckRecordItemProof->Index                 =$data["Index"];
                //$CheckRecordItemProof->Path                  =$file->getRealPath();
                $CheckRecordItemProof->Path                  =$data["Path"];
                $CheckRecordItemProof->Type                  =$data["Type"];
                $CheckRecordItemProof->FileName              =$data["FileName"];
            try{
                $CheckRecordItemProof->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function CheckRecordStaffs_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        /*foreach($request as $data){

        }*/
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料
                $CheckRecordStaff=new CheckRecordStaff;
                $CheckRecordStaff->CheckRecordWorkNumber   =$data["CheckRecordWorkNumber"];
                $CheckRecordStaff->PowerPlantStaffID       =$data["PowerPlantStaffID"];
            try{
                $CheckRecordStaff->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function Inspection_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            //初始化回傳結果
            // 寫入申辦人資料
            $InspectionSpec=new Inspection;
            $InspectionSpec->Date                 =$data["Date"];
            $InspectionSpec->Time                 =$data["Time"];
            $InspectionSpec->ContractorProjectID  =$data["ContractorProjectID"];
            $InspectionSpec->InspectionWorkNumber =$data["InspectionWorkNumber"];
            try{
                $InspectionSpec->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function InspectionSpec_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        /*foreach($request as $data){

        }*/
        for($i = 0 ; $i< count($request);$i++){
                $data = $request[$i];
                //初始化回傳結果
                $InspectionSpec=new InspectionSpec;
                $InspectionSpec->Year  =$data["Year"];
                $InspectionSpec->ItemB =$data["ItemB"];
                $InspectionSpec->ItemL =$data["ItemL"];
                $InspectionSpec->Item  =$data["Item"];
            try{
              $InspectionSpec->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function InspectionCheckItem_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        /*foreach($request as $data){

        }*/
        for($i = 0 ; $i< count($request);$i++){
                $data = $request[$i];
                $InspectionCheckItem=new InspectionCheckItem;
                $InspectionCheckItem->InspectionWorkNumber =$data["InspectionWorkNumber"];
                $InspectionCheckItem->InspectionItemSpecID =$data["InspectionItemSpecID"];
                $InspectionCheckItem->Type                 =$data["Type"];
                $InspectionCheckItem->TermsID              =$data["TermsID"];
                $InspectionCheckItem->Remark               =$data["Remark"];
            try{
                $InspectionCheckItem->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function InspectionCheckItemProof_json_upload(Request $request){
        //讀入資料
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        for($i = 0 ; $i< count($request);$i++){
            $data = $request[$i];
            $InspectionCheckItemProof=new InspectionCheckItemProof;
            $InspectionCheckItemProof->InspectionWorkNumber  =$data["InspectionWorkNumber"];
            $InspectionCheckItemProof->InspectionItemSpecID  =$data["InspectionItemSpecID"];
            $InspectionCheckItemProof->Path                  =$data["Path"];
            $InspectionCheckItemProof->Type                  =$data["Type"];
            $InspectionCheckItemProof->FileName              =$data["FileName"];
            try{
                $InspectionCheckItemProof->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
        }
        return json_encode($res);
    }
    public function CheckRecordTotal_json_upload(Request $request){
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";

        $ImgArray=array();

        for($i = 0 ; $i< count($request['list']);$i++){
            $data = $request['list'][$i];

            $PowerPlantStaffID=$data['PowerPlantStaffID'];
            $dt = new DateTime();
            $last = CheckRecord::where('CheckRecordWorkNumber','like','CRW'.$dt->format('Ymd').sprintf("%04d", $PowerPlantStaffID).'%')->get()->last();
            if($last == null){
                $ct = 1;
            }else{
                $ct = intval(substr($last->CheckRecordWorkNumber,-3)) + 1;
            }
            $CheckRecordWorkNumber = "CRW".$dt->format('Ymd').sprintf("%04d", $PowerPlantStaffID).sprintf("%03d", $ct);

            $CheckRecord=new CheckRecord;
            $CheckRecord->Date                           =date("Y-m-d",strtotime($data['Date']));
            $CheckRecord->Time                           =date("H:i:s",strtotime($data['Time']));
            $CheckRecord->CheckRecordWorkNumber          =$CheckRecordWorkNumber;
            $CheckRecord->PowerPlantStaffID              =$data['PowerPlantStaffID'];
            try{
                $CheckRecord->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }

            for($j = 0 ; $j< count($request['list'][$i]['CheckRecordStaffList']);$j++){
                $dataItem = $data['CheckRecordStaffList'][$j];
                $CheckRecordStaff=new CheckRecordStaff;
                $CheckRecordStaff->CheckRecordWorkNumber     =$CheckRecordWorkNumber;
                $CheckRecordStaff->PowerPlantStaffID         =$dataItem['PowerPlantStaffID'];
                try{
                    $CheckRecordStaff->save();
                }catch (QueryException $e){
                    $res->status_code = 1;
                    $res->message = "failed";
                    return json_encode($res);
                }
            }

            for($j = 0 ; $j< count($request['list'][$i]['CheckRecordItemList']);$j++){
                $dataItem = $data['CheckRecordItemList'][$j];
                $CheckRecordItem = new CheckRecordItem;
                $CheckRecordItem->CheckWorkNumber            =$CheckRecordWorkNumber;
                $CheckRecordItem->Index                      =$j +1;
                $CheckRecordItem->PowerPlantDepID          =$dataItem['PowerPlantDepID'];
                $CheckRecordItem->Area                       =$dataItem['Area'];
                $CheckRecordItem->Content                    =$dataItem['Content'];
                try {
                    $CheckRecordItem->save();
                } catch (QueryException $e) {
                    $res->status_code = 1;
                    $res->message = "failed";
                    return json_encode($res);
                }

                for($k = 0 ; $k< count($dataItem['CheckRecordItemProofList']);$k++){
                    $dataItemProof = $dataItem['CheckRecordItemProofList'][$k];
                    $CheckRecordItemProof=new CheckRecordItemProof;
                    $CheckRecordItemProof->CheckRecordWorkNumber =$CheckRecordWorkNumber;
                    $CheckRecordItemProof->CheckRecordIndex      = $j +1;
                    $CheckRecordItemProof->Index                 = count(CheckRecordItemProof::where('CheckRecordWorkNumber',$CheckRecordWorkNumber)->where('Path','uploads')->get()) + 1;
                    $CheckRecordItemProof->Path                  ='uploads';
                    $CheckRecordItemProof->Type                  =$dataItemProof['Type'];
                    $CheckRecordItemProof->FileName              =$CheckRecordWorkNumber.sprintf("%02d", $j+1).sprintf("%02d", $k+1);
                    $ImgArray[] = $CheckRecordItemProof->FileName;
                    try {
                        $CheckRecordItemProof->save();
                    } catch (QueryException $e) {
                        $res->status_code = 1;
                        $res->message = "failed";
                        return json_encode($res);
                    }
                }
            }
        }
        $res->data = $ImgArray;
        return json_encode($res);
    }
    public function InspectionTotal_json_upload(Request $request){
        //
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";

        $ImgArray=array();

        //return var_dump($CheckRecord[0]['CheckRecordWorkNumber']);
        for($i = 0 ; $i< count($request['list']);$i++){
            $data = $request['list'][$i];
            $InspectionWorkNumber=$data['InspectionWorkNumber'];

            $Inspection=new Inspection;
            $Inspection->Date                            =date("Y-m-d",strtotime($data['Date']));
            $Inspection->Time                            =date("H:i:s",strtotime($data['Time']));
            $Inspection->ContractorProjectID             =$data['ContractorProjID'];
            $Inspection->PowerPlantStaffID                  =$data['PowerPlantStaffID'];
            $dt = new DateTime();
            $last = count(Inspection::where('InspectionWorkNumber','like','IPT'.$dt->format('Ymd').sprintf("%04d", $data['ContractorProjID']).'%')->get()) + 1;
            $InspectionWorkNumber = 'IPT'.$dt->format('Ymd').sprintf("%04d", $data['ContractorProjID']).sprintf("%03d", $last);

            $Inspection->InspectionWorkNumber            =$InspectionWorkNumber;
            try{
                $Inspection->save();
            }catch (QueryException $e){
                $res->status_code = 1;
                $res->message = "failed";
                return json_encode($res);
            }
            for($j = 0 ; $j< count($request['list'][$i]['InspectionItemList']);$j++){
                $dataItem = $data['InspectionItemList'][$j];

                if(intval($dataItem['OperationSpecItemID'])==0){
                    $OperationSpecItemID=0;
                }else{
                    $OperationSpecItemID=$dataItem['OperationSpecItemID'];
                }
                $InspectionCheckItem=new InspectionCheckItem;
                $InspectionCheckItem->InspectionWorkNumber       =$InspectionWorkNumber;


                $InspectionCheckItem->InspectionItemSpecID       =$OperationSpecItemID;

                $InspectionCheckItem->Conform                    =$dataItem['Conform'];
                $InspectionCheckItem->TermsID                    =$dataItem['TermsID'];
                $InspectionCheckItem->Remark                     =$dataItem['Remark'];
                $InspectionCheckItem->Status                     =$InspectionCheckItem->Conform ;
                try {
                    $InspectionCheckItem->save();
                } catch (Exception $e) {
                    $res->status_code = 1;
                    $res->message = "failed";
                    return json_encode($res);
                }

                for($k = 0 ; $k< count($dataItem['InspectionItemProofList']);$k++){
                    $dataItemProof = $dataItem['InspectionItemProofList'][$k];
                    $InspectionCheckItemProof=new InspectionCheckItemProof;
                    $InspectionCheckItemProof->InspectionWorkNumber  =$InspectionWorkNumber;
                    $InspectionCheckItemProof->InspectionItemID  =$InspectionCheckItem->id;
                    $InspectionCheckItemProof->Path                  ='uploads';
                    $InspectionCheckItemProof->Type                  =$dataItemProof['Type'];

                    $count=count(InspectionCheckItemProof::where('FileName','like',substr($InspectionWorkNumber, 0, -3).'%')->get()) + 1;
                    $InspectionCheckItemProof->FileName              =substr($InspectionWorkNumber, 0, -3).sprintf("%03d", $count);
                    $ImgArray[] = $InspectionCheckItemProof->FileName;
                    try {
                        $InspectionCheckItemProof->save();
                    } catch (QueryException $e) {
                        $res->status_code = 1;
                        $res->message = "failed";
                        return json_encode($res);
                    }
                }
            }
        }
        $res->data = $ImgArray;
        return json_encode($res);
    }

    public function Dep(Request $request){
        $res = new Res;
        $res->status_code = 0;
        $res->message = "success";
        $res->data = PowerPlantDep::select('Class','id','Dep')->get()->groupBy('Dep');
        return json_encode($res);
    }
}