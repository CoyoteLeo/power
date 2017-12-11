<?php

namespace App\Http\Controllers;

use DateTime;
use Elibyy\TCPDF\TCPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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

use App\OperationSpecItem;


use App\Terms;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\TemplateProcessor;

class HistoryController extends Controller
{
    public function Word()
    {
        $phpWord = new PhpWord();
        //$zip = new ZipArchive();
        //$templateProcessor = IOFactory::load('./Word/1.doc');
        $templateProcessor = new TemplateProcessor('./Word/1.docx');
        $templateProcessor->
        // 進行變數代換
        $templateProcessor->setValue('Time', '2017-12-10');
        $templateProcessor->setValue('Company', '加雲聯網');
        $templateProcessor->setValue('Project', '火力發電廠工安巡檢資訊系統');
        $templateProcessor->setValue('Remark', '這裡是註解');
        $templateProcessor->setImg('ImgArray',array('src' => '2.png','swh'=>'500'));
// 不知道為啥，phpword 不讓我們直接輸出到瀏覽器，所以得先存檔
        $templateProcessor->saveAs("2017-12-11工安巡檢.docx");

// 再想辦法把他輸出到瀏覽器裏
        header('Content-Type: application/vnd.ms-word');
        header('Content-Disposition: attachment;filename="2017-12-11工安巡檢.docx"');
        header('Cache-Control: max-age=0');

        $name = '2017-12-11工安巡檢.docx';
        $fp = fopen($name, 'rb');
        fpassthru($fp);

// 一定要用 exit
        exit;
    }

    public function WorkNumberChage($number){
        if(strlen($number)==1){
            $str="00".$number;
        }else if(strlen($number)==2){
            $str="0"+$number;
        }else if(strlen($number)==3){
            $str=$number;
        }else {
            $str=$number;
        }
        return $str;
    }
	public function index(){
		if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItemAll= CheckRecordItem::whereNotNull('CompleteDate')->join('power_plant_deps','check_record_items.PowerPlantDepID','=','power_plant_deps.id')->orderBy('CheckWorkNumber', 'desc')
                ->select('check_record_items.*', 'power_plant_deps.Dep')->get();

            $CheckRecordItemlist = array();
            foreach($CheckRecordItemAll as $CheckRecordItem){
                $CheckRecordStaffAll= CheckRecordStaff::where('CheckRecordWorkNumber',$CheckRecordItem->CheckWorkNumber)->Select('PowerPlantStaffId')->get();
                $Staff = array();
                foreach($CheckRecordStaffAll as $CheckRecordStaff){
                    $Name = PowerPlantStaff::Where('id',$CheckRecordStaff->PowerPlantStaffId)->get()->first()->Name;
                    $Staff[] = $Name;
                }
                $CheckRecordItem['PowerPlantStaffId'] = $Staff;
                $CheckRecordItemlist[] = $CheckRecordItem;
            }

            $InspectionCheckItems = InspectionCheckItem::where('Status','1')->join('operation_spec_items', 'operation_spec_items.ID', '=', 'inspection_check_items.InspectionItemSpecID')
                ->leftjoin('terms', 'terms.id', '=', 'inspection_check_items.TermsID')
                ->join('operation_spec_categories', 'operation_spec_categories.ID', '=', 'operation_spec_items.OperationSpecCategoryID')
                ->join('inspections','inspections.InspectionWorkNumber','=','inspection_check_items.InspectionWorkNumber')
                ->join('contractor_projects','contractor_projects.id','=','inspections.ContractorProjectID')
                ->join('contractors','contractors.id','=','contractor_projects.ContractorID')
                ->join('power_plant_deps','power_plant_deps.id','=','contractor_projects.PowerPlantDepID')
                ->join('power_plant_staffs','power_plant_staffs.id','=','contractor_projects.PowerPlantStaffID')
                ->select('inspection_check_items.*', 'terms.Content', 'terms.ItemB', 'terms.ItemL', 'operation_spec_items.Name', 'operation_spec_categories.Name as CategoriesName',
                    'contractor_projects.name as contractor_projects' , 'power_plant_deps.Dep as Dep' , 'power_plant_staffs.Name as StaffName' ,'contractors.CompanyName' ,'inspections.Deadline' ,'inspections.FineNumber'
                )
                ->orderBy('id', 'desc')->get();

            $data=array('CheckRecordItemlist' =>  $CheckRecordItemlist ,'InspectionCheckItems' =>  $InspectionCheckItems);

			return  view('history.index',$data);
		}
        return  redirect::route('login.index');
	}
    //查核紀錄-資料庫
    public function CheckRecord_insert(Request $req){
        if(Auth::guard('power_plant_staffs')->check()){
            $powerplantstaffid= $this->WorkNumberChage(Auth::guard('power_plant_staffs')->user()->id);
            $search="'CRW".date("Ymd",strtotime($req->input('Date'))).$powerplantstaffid."'" ;

            $len=11+strlen($powerplantstaffid);
            $count=CheckRecord::selectRaw('count(*) as count')->whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->first();
            if($count->count==0){
                $index=0;
            }else{
                $count=CheckRecord::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->orderBy('CheckRecordWorkNumber', 'desc')->first();
                $index= intval(substr($count->CheckRecordWorkNumber, -3))+1;
            }
            $number= $this->WorkNumberChage($index);
            
            $CheckRecord=new CheckRecord;
            $CheckRecord->Date                    =$req->input('Date');
            $CheckRecord->Time                    =$req->input('Time');
            $CheckRecord->CheckRecordWorkNumber   ='CRW'.date("Ymd",strtotime($req->input('Date'))).$powerplantstaffid.$number;
            $CheckRecord->PowerPlantStaffID       = Auth::guard('power_plant_staffs')->user()->id;
            $CheckRecord->save();
            return Redirect::route('history.index');
        }
        return Redirect::route('login.index');;
    }
    public function CheckRecord_delete($id){
        $CheckRecord=CheckRecord::whereRaw('[id]='.$id)->first();
        $CheckRecordWorkNumber=$CheckRecord->CheckRecordWorkNumber;
        $len=strlen($CheckRecordWorkNumber);
        $search="'".$CheckRecordWorkNumber."'";

        $deletes=CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."");
        foreach ($deletes as $delete) {

            $file_path ="C:\\xampp\htdocs\\power\public\uploads\\".$delete->FileName.".".$delete->Type;
            File::delete($file_path);
        }
        CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->delete();
        CheckRecordItem::whereRaw("substring([CheckWorkNumber],1,".$len.")=".$search."")->delete();
        CheckRecordStaff::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->delete();
        CheckRecord::find($id)->delete();
        //return  $file_path;

        return Redirect::route('history.index');
    }
    //查核紀錄項目-資料庫
    public function CheckRecordItemAll(){

        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItemAll= CheckRecordItem::whereNull('CompleteDate')->join('power_plant_deps','check_record_items.PowerPlantDepID','=','power_plant_deps.id')->orderBy('CheckWorkNumber', 'desc')
                ->select('check_record_items.*', 'power_plant_deps.Dep')->get();

            $CheckRecordItemlist = array();
            foreach($CheckRecordItemAll as $CheckRecordItem){
                $CheckRecordStaffAll= CheckRecordStaff::where('CheckRecordWorkNumber',$CheckRecordItem->CheckWorkNumber)->Select('PowerPlantStaffId')->get();
                $Staff = array();
                foreach($CheckRecordStaffAll as $CheckRecordStaff){
                    $Name = PowerPlantStaff::Where('id',$CheckRecordStaff->PowerPlantStaffId)->get()->first()->Name;
                    $Staff[] = $Name;
                }
                $CheckRecordItem['PowerPlantStaffId'] = $Staff;
                $CheckRecordItemlist[] = $CheckRecordItem;
            }

            $data=array('CheckRecordItemlist' =>  $CheckRecordItemlist );
            return  view('history.CheckRecord.CheckRecordItemAll',$data);
        }
        return Redirect::route('login.index');
    }

    public function CheckRecordItem($id){
        //$CheckRecordItem = CheckRecordItem::all();
        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItem = CheckRecordItem::whereRaw("substring([CheckWorkNumber],1,".strlen($id).")='".$id."'" )->get();
            $data            = array('CheckRecordItems' => $CheckRecordItem ,'id' => $id);
            return view('history.CheckRecord.CheckRecordItem',$data);
        }
        return Redirect::route('login.index');
    }
    public function CheckRecordItem_edit($id){
        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItem = CheckRecordItem::find($id);
            $data            = array('CheckRecordItems' => $CheckRecordItem ,'id' => $id);
            return view('history.CheckRecord.edit.CheckRecordItem',$data);
        }
        return Redirect::route('login.index');
    }
    public function CheckRecordItem_update(Request $req){
        if(Auth::guard('power_plant_staffs')->check()) {
            $CheckRecordItem = CheckRecordItem::find($req->input('id'));
            $CheckRecordItem->Area = $req->input('Area');
            $CheckRecordItem->Content = $req->input('Content');
            $CheckRecordItem->save();

            return Redirect::route('history.CheckRecordItemAll');
        }
        return Redirect::route('login.index');
    }
    public function CheckRecordItem_insert(Request $req){
        if(Auth::guard('power_plant_staffs')->check()){
            if($req->input('Type')=='Fine'){
                CheckRecordItem::where('CheckWorkNumber',$req->input('CheckWorkNumber'))->where('Index', $req->input('index'))->update(['FineNumber'=>$req->FineNumber]);
            }else{
                CheckRecordItem::where('CheckWorkNumber',$req->input('CheckWorkNumber'))->where('Index', $req->input('index'))->update(['Deadline'=>$req->Deadline]);
            }
            return Redirect::route('history.CheckRecordItemAll');
        }
        return Redirect::route('login.index');
    }
    public function CheckRecordItem_delete($id){
        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItem=CheckRecordItem::whereRaw("[id]=".$id."")->first();
            $CheckRecordWorkNumber=$CheckRecordItem->CheckWorkNumber;
            $len=strlen($CheckRecordWorkNumber);
            $search="'".$CheckRecordWorkNumber."'";

            $deletes=CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->get();
            //return $deletes;
            foreach ($deletes as $delete) {

                $file_path ="C:\\xampp\htdocs\\power\public\uploads\\".$delete->FileName.".".$delete->Type;
                File::delete($file_path);
            }
            CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".$len.")=".$search."")->delete();
            CheckRecordItem::find($id)->delete();
            //return  $file_path;
            return Redirect::route('history.CheckRecordItem',['id'=> $CheckRecordWorkNumber]);
        }
        return Redirect::route('login.index');
    }

    //查核紀錄佐證資料-資料庫
    public function CheckRecordItemProof($id,$index){
        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordItemProofs= CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".strlen($id).")='".$id."'" )->where('path','uploads')->where('CheckRecordIndex',$index)->orderBy('Index', 'desc')->get();
            $CheckRecordItemProofs_after= CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".strlen($id).")='".$id."'" )->where('path','upload')->where('CheckRecordIndex',$index)->orderBy('Index', 'desc')->get();
            $CheckRecordItem = CheckRecordItem::where('CheckWorkNumber',$id)->where('Index', $index)->get()->first();

            $data= array('CheckRecordItemProofs'=>$CheckRecordItemProofs, 'id' => $id,'CheckRecordItemProofs_after' => $CheckRecordItemProofs_after, 'index' => $index , 'CheckRecordItem' => $CheckRecordItem);
            return view('history.CheckRecord.CheckRecordItemProof', $data);
        }
        return Redirect::route('login.index');
    }

    public function CheckRecordItemPrint($id,$index){

        if(Auth::guard('power_plant_staffs')->check()){
            $CheckRecordStaffAll= CheckRecordStaff::where('CheckRecordWorkNumber',$id)->Select('PowerPlantStaffId')->get();
            $Staff = '';
            $i = 0;
            foreach($CheckRecordStaffAll as $CheckRecordStaff){
                $i = $i + 1;
                $Name = PowerPlantStaff::Where('id',$CheckRecordStaff->PowerPlantStaffId)->get()->first()->Name;
                if($i > 1){
                    $Staff = $Staff.',';
                }
                $Staff = $Staff.$Name;
            }
            $CheckRecordItemProofs= CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".strlen($id).")='".$id."'" )->where('path','uploads')->where('CheckRecordIndex',$index)->orderBy('Index', 'desc')->get();
            $CheckRecordItemProofs_after= CheckRecordItemProof::whereRaw("substring([CheckRecordWorkNumber],1,".strlen($id).")='".$id."'" )->where('path','upload')->where('CheckRecordIndex',$index)->orderBy('Index', 'desc')->get();
            $CheckRecordItem = CheckRecordItem::where('CheckWorkNumber',$id)->where('Index', $index)->get()->first();
            $PlantName = PowerPlantDep::Where('id',$CheckRecordItem->PowerPlantDepID)->get()->first()->Dep;

            $templateProcessor = new TemplateProcessor('./Word/2.docx');

            // 進行變數代換
            $templateProcessor->setValue('Staff', $Staff);
            $templateProcessor->setValue('Time', $CheckRecordItem->created_at);
            $templateProcessor->setValue('Area', $CheckRecordItem->Area);
            $templateProcessor->setValue('Content',  $CheckRecordItem->Content);
            $templateProcessor->setValue('PowerPlantDepID',  $PlantName);
            if($CheckRecordItem->Deadline != null){
                $templateProcessor->setValue('DeadLine',  $CheckRecordItem->Deadline);
            }else{
                $templateProcessor->setValue('DeadLine', '');
            }
            if($CheckRecordItem->CompleteDate != null){
                $templateProcessor->setValue('Complete',  $CheckRecordItem->CompleteDate);
            }else{
                $templateProcessor->setValue('Complete', '');
            }

            for($i=0 ; $i < count($CheckRecordItemProofs) ; $i++){
                if($i < 9){
                    if(file_exists('./'.$CheckRecordItemProofs[$i]->Path.'/'.$CheckRecordItemProofs[$i]->FileName.'.'.$CheckRecordItemProofs[$i]->Type)){
                        $templateProcessor->setImg('Before'.($i+1),array('src' => './'.$CheckRecordItemProofs[$i]->Path.'/'.$CheckRecordItemProofs[$i]->FileName.'.'.$CheckRecordItemProofs[$i]->Type,'swh'=>'500'));
                    }else{
                        $templateProcessor->setValue('Before'.($i+1),'');
                    }
                }
            }
            for($i = count($CheckRecordItemProofs) ; $i < 9 ; $i++){
                $templateProcessor->setValue('Before'.($i+1),'');
            }

            for($i=0 ; $i < count($CheckRecordItemProofs_after) ; $i++){
                if($i < 9){
                    if(file_exists('./'.$CheckRecordItemProofs_after[$i]->Path.'/'.$CheckRecordItemProofs_after[$i]->FileName.'.'.$CheckRecordItemProofs_after[$i]->Type)){
                        $templateProcessor->setImg('After'.($i+1),array('src' => './'.$CheckRecordItemProofs_after[$i]->Path.'/'.$CheckRecordItemProofs_after[$i]->FileName.'.'.$CheckRecordItemProofs_after[$i]->Type,'swh'=>'500'));
                    }else{
                        $templateProcessor->setValue('After'.($i+1),'');
                    }
                }
            }
            for($i = count($CheckRecordItemProofs_after) ; $i < 9 ; $i++){
                $templateProcessor->setValue('After'.($i+1),'');
            }
            // 不知道為啥，phpword 不讓我們直接輸出到瀏覽器，所以得先存檔
            $templateProcessor->saveAs('./Word/'.$id."查核紀錄.docx");

            // 再想辦法把他輸出到瀏覽器裏
            header('Content-Type: application/vnd.ms-word');
            header('Content-Disposition: attachment;filename="'.$id.'查核紀錄.docx');
            header('Cache-Control: max-age=0');

            $name = './Word/'.$id."查核紀錄.docx";
            $fp = fopen($name, 'rb');
            fpassthru($fp);

            // 一定要用 exit
            exit;
        }


        return Redirect::route('login.index');
    }

    public function CheckRecordItemProof_insert(Request $req){
        if(Auth::guard('power_plant_staffs')->check()){
            if(Input::hasFile('file')){
                $search="'".$req->input('CheckRecordWorkNumber')."'" ;
                $count=CheckRecordItemProof::selectRaw('count(*) as count')->whereRaw("[CheckRecordWorkNumber]=".$search )->where('path','upload') ->first();
                $index = $count->count + 1;

                $CheckRecordItemProof=new CheckRecordItemProof;
                $CheckRecordItemProof->CheckRecordWorkNumber =$req->input('CheckRecordWorkNumber');
                $CheckRecordItemProof->CheckRecordIndex      =$req->input('index');


                $CheckRecordItemProof->Index                 =$index;
                $file = Input::file('file');
                //$CheckRecordItemProof->Path                  =$file->getRealPath();
                $CheckRecordItemProof->Path                  ='upload';
                $file->move('upload', $req->input('CheckRecordWorkNumber').sprintf("%02d", $CheckRecordItemProof->CheckRecordIndex).sprintf("%02d", $index).".".$file->getClientOriginalExtension());
                $CheckRecordItemProof->Type                  =$file->getClientOriginalExtension();
                $CheckRecordItemProof->FileName              =$req->input('CheckRecordWorkNumber').sprintf("%02d", $CheckRecordItemProof->CheckRecordIndex).sprintf("%02d", $index);
                $CheckRecordItemProof->save();
                $dt = new DateTime();
                CheckRecordItem::where('CheckWorkNumber',$req->input('CheckRecordWorkNumber'))->where('Index', $req->input('index'))->update(['CompleteDate'=>$dt->format('Y-m-d')]);
                return Redirect::route('history.CheckRecordItemProof',['id' => $req->input('CheckRecordWorkNumber'),'index' => $req->input('index')]);
            }
        }
        return Redirect::route('login.index');
    }
    public function CheckRecordItemProof_delete($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $delete = CheckRecordItemProof::find($id);

            $file_path = "C:\\xampp\htdocs\\power\public\uploads\\" . $delete->FileName . "." . $delete->Type;
            File::delete($file_path);
            //return  $file_path;
            CheckRecordItemProof::find($id)->delete();
            return Redirect::route('history.CheckRecordItemProof', ['id' => $delete->CheckRecordWorkNumber]);
        }
        return Redirect::route('login.index');
    }
    //查巡查核-資料庫
    public function Inspection_insert(Request $req){
        //
        if(Auth::guard('power_plant_staffs')->check()) {
            $powerplantstaffid= $this->WorkNumberChage(Auth::guard('power_plant_staffs')->user()->id);
            $search="'IRT".date("Ymd",strtotime($req->input('Date'))).$powerplantstaffid."'" ;
            $len=11+strlen($powerplantstaffid);
            $count=Inspection::selectRaw('count(*) as count')->whereRaw("substring([InspectionWorkNumber],1,".$len.")=".$search."")->first();
            if($count->count==0){
                    $index=1;
                }else{
                    $WorkNumber=Inspection::whereRaw("substring([InspectionWorkNumber],1,".$len.")=".$search)->orderBy('InspectionWorkNumber', 'desc')->first();
                    //return $WorkNumber;
                    $index=intval(substr($WorkNumber->InspectionWorkNumber, -3))+1;
                }
            $number= $this->WorkNumberChage($index);

            $InspectionSpec=new Inspection;
            $InspectionSpec->Date                 =$req->input('Date');
            $InspectionSpec->Time                 =$req->input('Time');
            $InspectionSpec->Deadline             =$req->input('Deadline');
            $InspectionSpec->ContractorProjectID  =$req->input('ContractorProjectID');
            $InspectionSpec->InspectionWorkNumber ='IRT'.date("Ymd",strtotime($req->input('Date'))).$powerplantstaffid.$number;
            $InspectionSpec->save();
            return Redirect::route('history.index');
        }
        return Redirect::route('login.index');
    }
    public function Inspection_update(Request $req){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionSpec = Inspection::find($req->input('id'));
            $InspectionSpec->Date = $req->input('Date');
            $InspectionSpec->Time = $req->input('Time');
            $InspectionSpec->ContractorProjectID = $req->input('ContractorProjectID');
            $InspectionSpec->save();
            return Redirect::route('history.index');
        }
        return Redirect::route('login.index');
    }
    public function Inspection_delete($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            Inspection::find($id)->delete();
            return Redirect::route('history.index');
        }
        return Redirect::route('login.index');
    }
    public function Inspection_edit($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $ContractorProject = ContractorProject::all();
            $Inspection = Inspection::find($id);
            $data = array('Inspections' => $Inspection, 'ContractorProjects' => $ContractorProject);
            return view('history.edit.Inspection', $data);
        }
        return Redirect::route('login.index');
    }

    //查巡查核項目規格-資料庫
    public function InspectionCheckItemAll(){
        if(Auth::guard('power_plant_staffs')->check()){
            $InspectionCheckItems = InspectionCheckItem::where('Status','0')->join('operation_spec_items', 'operation_spec_items.ID', '=', 'inspection_check_items.InspectionItemSpecID')
                ->leftjoin('terms', 'terms.id', '=', 'inspection_check_items.TermsID')
                ->join('operation_spec_categories', 'operation_spec_categories.ID', '=', 'operation_spec_items.OperationSpecCategoryID')
                ->join('inspections','inspections.InspectionWorkNumber','=','inspection_check_items.InspectionWorkNumber')
                ->join('contractor_projects','contractor_projects.id','=','inspections.ContractorProjectID')
                ->join('contractors','contractors.id','=','contractor_projects.ContractorID')
                ->join('power_plant_deps','power_plant_deps.id','=','contractor_projects.PowerPlantDepID')
                ->join('power_plant_staffs','power_plant_staffs.id','=','inspections.PowerPlantStaffID')
                ->select('inspection_check_items.*', 'terms.Content', 'terms.ItemB', 'terms.ItemL', 'operation_spec_items.Name', 'operation_spec_categories.Name as CategoriesName',
                        'contractor_projects.name as contractor_projects' , 'power_plant_deps.Dep as Dep' , 'power_plant_staffs.Name as StaffName' ,'contractors.CompanyName' ,'inspections.Deadline' ,'inspections.FineNumber'
                )
                ->orderBy('id', 'desc')->get();

            $data=array('InspectionCheckItems' =>  $InspectionCheckItems);
            //return $data;
            return  view('history.Inspection.InspectionCheckItemAll',$data);
        }
        return Redirect::route('login.index');
    }

    public function InspectionCheckItemPrint($index){
        $InspectionCheckItem = InspectionCheckItem::where('id', $index)->get()->first();
        $Inspections = Inspection::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->get()->first();
        $InspectionsAll = InspectionCheckItem::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->get();

        //return InspectionCheckItem::where('InspectionWorkNumber',$InspectionCheckItem->InspectionWorkNumber)->get();
        $InspectionCheckItemProof = InspectionCheckItemProof::where('InspectionItemID',$index)->where('Path','uploads')->get();
        $InspectionCheckItemProof_after = InspectionCheckItemProof::where('InspectionItemID',$index)->where('Path','upload')->get();
        $Project = ContractorProject::where('id',$Inspections->ContractorProjectID)->get()->first();
        $Company = Contractor::where('id',$Project->ContractorID)->get()->first()->CompanyName;

        $Staff = PowerPlantStaff::Where('id',$Inspections->PowerPlantStaffID)->get()->first()->Name;

        $templateProcessor = new TemplateProcessor('./Word/1.docx');
        //□
        //
        //×
        // 進行變數代換
        $templateProcessor->setValue('Staff', $Staff);
        $templateProcessor->setValue('Time', $Inspections->created_at);
        $templateProcessor->setValue('Company', $Company);
        $templateProcessor->setValue('Project', $Project->name);
        if($InspectionCheckItem->Remark == null){
            $templateProcessor->setValue('Remark', '無');
        }else{
            $templateProcessor->setValue('Remark', $InspectionCheckItem->Remark);
        }

        for($i = 1 ; $i <= 99 ;$i++) {
            $in = false;
            $Conform = true;
            foreach($InspectionsAll as $InspectionsAlll){
                if($InspectionsAlll->InspectionItemSpecID == $i){
                    $in = true;
                    if ($InspectionsAlll->Conform == 1) {
                        $Conform = true;
                    } else {
                        $Conform = false;
                    }
                }
            }

            if ($i < 92 or $i > 95) {
                if ($in) {
                    if ($Conform) {
                        $templateProcessor->setValue($i, 'Ｖ');
                    } else {
                        $templateProcessor->setValue($i, 'Ｘ');
                    }
                } else {
                    $templateProcessor->setValue($i, '□');
                }
            } else {
                if ($in) {
                    if ($Conform) {
                        $templateProcessor->setValue($i . '_1', 'Ｖ');
                        $templateProcessor->setValue($i . '_0', '□');
                    } else {
                        $templateProcessor->setValue($i . '_0', 'Ｖ');
                        $templateProcessor->setValue($i . '_１', '□');
                    }
                } else {
                    $templateProcessor->setValue($i . '_0', '□');
                    $templateProcessor->setValue($i . '_1', '□');
                }
            }
        }
       // $templateProcessor->setValue('B1', '【'.'123'.'】改善前：');
        //$templateProcessor->setImg('B2',array('src' =>'./upload/IPT201712060336008.jpg','swh'=>'500'));

        $count = 0;

        foreach ($InspectionsAll as $InspectionsAlll){
            $ProofAll_Before = InspectionCheckItemProof::where('InspectionItemID',$InspectionsAlll->id)->where('Path','uploads')->get();
            $ProofAll_After = InspectionCheckItemProof::where('InspectionItemID',$InspectionsAlll->id)->where('Path','upload')->get();
            $Item = OperationSpecItem::where('id',$InspectionsAlll->InspectionItemSpecID)->get()->first()->Name;
            //dd($Item);

            if(count($ProofAll_Before) + count($ProofAll_After) > 0){
                $count = $count + 1;
                $templateProcessor->setValue('B'.$count, '<w:br/>【'.$Item.'】改善前：<w:br/>');
                foreach ($ProofAll_Before as $Proof){
                    $count = $count + 1;
                    $Name = './'.$Proof->Path.'/'.$Proof->FileName.'.'.$Proof->Type;
                    if(file_exists($Name)){
                        $templateProcessor->setImg('B'.$count,array('src' => $Name,'swh'=>'500'));
                    }else{
                        $templateProcessor->setValue('B'.$count,'');
                    }
                }
                $count = $count + 1;
                $templateProcessor->setValue('B'.$count, '<w:br/>【'.$Item.'】改善後：<w:br/>');
                foreach ($ProofAll_After as $Proof){
                    $count = $count + 1;
                    $Name = './'.$Proof->Path.'/'.$Proof->FileName.'.'.$Proof->Type;
                    if(file_exists($Name)){
                        $templateProcessor->setImg('B'.$count,array('src' =>$Name,'swh'=>'500'));
                    }else{
                        $templateProcessor->setValue('B'.$count,'');
                    }
                }
            }
        }
        for($i = $count + 1 ;$i <=200 ; $i++){
            $templateProcessor->setValue('B'.$i,'');
        }
//
//        for($i=0 ; $i < count($InspectionCheckItemProof) ; $i++){
//            if($i < 9){
//                if(file_exists('./'.$InspectionCheckItemProof[$i]->Path.'/'.$InspectionCheckItemProof[$i]->FileName.'.'.$InspectionCheckItemProof[$i]->Type)){
//                    $templateProcessor->setImg('Before'.($i+1),array('src' => './'.$InspectionCheckItemProof[$i]->Path.'/'.$InspectionCheckItemProof[$i]->FileName.'.'.$InspectionCheckItemProof[$i]->Type,'swh'=>'500'));
//                }else{
//                    $templateProcessor->setValue('Before'.($i+1),'');
//                }
//            }
//        }
//        for($i = count($InspectionCheckItemProof) ; $i < 9 ; $i++){
//            $templateProcessor->setValue('Before'.($i+1),'');
//        }
//
//        for($i=0 ; $i < count($InspectionCheckItemProof_after) ; $i++){
//            if($i < 9){
//                if(file_exists('./'.$InspectionCheckItemProof_after[$i]->Path.'/'.$InspectionCheckItemProof_after[$i]->FileName.'.'.$InspectionCheckItemProof_after[$i]->Type)){
//                    $templateProcessor->setImg('After'.($i+1),array('src' => './'.$InspectionCheckItemProof_after[$i]->Path.'/'.$InspectionCheckItemProof_after[$i]->FileName.'.'.$InspectionCheckItemProof_after[$i]->Type,'swh'=>'500'));
//                }else{
//                    $templateProcessor->setValue('After'.($i+1),'');
//                }
//            }
//        }
//        for($i = count($InspectionCheckItemProof_after) ; $i < 9 ; $i++){
//            $templateProcessor->setValue('After'.($i+1),'');
//        }

        // 不知道為啥，phpword 不讓我們直接輸出到瀏覽器，所以得先存檔
        $templateProcessor->saveAs('./Word/'.$Inspections->InspectionWorkNumber."工安巡檢.docx");

        // 再想辦法把他輸出到瀏覽器裏
        header('Content-Type: application/vnd.ms-word');
        header('Content-Disposition: attachment;filename="'.$Inspections->InspectionWorkNumber.'工安巡檢.docx');
        header('Cache-Control: max-age=0');

        $name = './Word/'.$Inspections->InspectionWorkNumber."工安巡檢.docx";
        $fp = fopen($name, 'rb');
        fpassthru($fp);

        // 一定要用 exit
        exit;
        return $InspectionsCheck;
   }

    //查巡查核項目-資料庫
    public function InspectionCheckItem($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItemss = InspectionCheckItem::where('InspectionWorkNumber', $id)->whereNotNull('TermsID')->join('operation_spec_items', 'operation_spec_items.ID', '=', 'inspection_check_items.InspectionItemSpecID')
                ->join('terms', 'terms.id', '=', 'inspection_check_items.TermsID')->join('operation_spec_categories', 'operation_spec_categories.ID', '=', 'operation_spec_items.OperationSpecCategoryID')
                ->select('inspection_check_items.*', 'terms.Content', 'terms.ItemB', 'terms.ItemL', 'operation_spec_items.Name', 'operation_spec_categories.Name as CategoriesName')->orderBy('InspectionWorkNumber', 'desc')->get();

            $InspectionCheckItems = InspectionCheckItem::where('InspectionWorkNumber', $id)->where('TermsID', null)->join('operation_spec_items', 'operation_spec_items.ID', '=', 'inspection_check_items.InspectionItemSpecID')
                ->join('operation_spec_categories', 'operation_spec_categories.ID', '=', 'operation_spec_items.OperationSpecCategoryID')
                ->select('inspection_check_items.*', 'operation_spec_items.Name', 'operation_spec_categories.Name as CategoriesName')->orderBy('InspectionWorkNumber', 'desc')->get();

            $Inspections = Inspection::where('InspectionWorkNumber', $id)->get()->first();

            $data = array('InspectionCheckItems' => $InspectionCheckItems, 'id' => $id, 'Inspections' => $Inspections, 'InspectionCheckItemss' => $InspectionCheckItemss);
            //dd($data);
            return view('history.Inspection.InspectionCheckItem', $data);
        }
        return Redirect::route('login.index');
    }

    public function InspectionCheckItem_insert(Request $req){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItem = InspectionCheckItem::where('id', $req->input('id'))->get()->first()->InspectionWorkNumber;

            if ($req->input('Type') == 'Fine') {
                Inspection::where('InspectionWorkNumber', $InspectionCheckItem)->update(['FineNumber' => $req->FineNumber]);
            } else {
                Inspection::where('InspectionWorkNumber', $InspectionCheckItem)->update(['Deadline' => $req->Deadline]);
            }
            return Redirect::route('history.InspectionCheckItemAll');
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItem_delete($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItem = InspectionCheckItem::find($id)->first();
            InspectionCheckItem::find($id)->delete();
            return Redirect::route('history.InspectionCheckItem', ['id' => $InspectionCheckItem->InspectionWorkNumber]);
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItemProof($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItemProofs = InspectionCheckItemProof::where('InspectionItemID', $id)->where('path', 'uploads')->orderBy('id', 'desc')->get();
            $InspectionCheckItemProofs_after = InspectionCheckItemProof::where('InspectionItemID', $id)->where('path', 'upload')->orderBy('id', 'desc')->get();
            $InspectionCheckItem = InspectionCheckItem::where('id', $id)->get()->first()->InspectionWorkNumber;
            $Inspections = Inspection::where('InspectionWorkNumber',$InspectionCheckItem)->get()->first();

            $data = array('InspectionCheckItemProofs' => $InspectionCheckItemProofs, 'id' => $id, 'InspectionCheckItemProofs_after' => $InspectionCheckItemProofs_after, 'Inspections' => $Inspections);
            return view('history.Inspection.InspectionCheckItemProof', $data);
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItemProof_insert(Request $req){
        if(Auth::guard('power_plant_staffs')->check()) {
            if (Input::hasFile('file')) {
                $Item = substr(InspectionCheckItem::Where('id', $req->id)->get()->first()->InspectionWorkNumber,0,-3);
                
                $count = count(InspectionCheckItemProof::where('FileName', 'like', $Item . '%')->get()) + 1;

                $InspectionCheckItemProof = new InspectionCheckItemProof;
                $InspectionCheckItemProof->InspectionWorkNumber = $Item;
                $InspectionCheckItemProof->InspectionItemID = $req->id;
                $file = Input::file('file');
                $InspectionCheckItemProof->Path = 'upload';
                $file->move('upload',  $Item . sprintf("%03d", $count). "." . $file->getClientOriginalExtension());
                $InspectionCheckItemProof->Type = $file->getClientOriginalExtension();
                $InspectionCheckItemProof->FileName =  $Item . sprintf("%03d", $count);
                $InspectionCheckItemProof->save();

                InspectionCheckItem::where('id', $req->input('id'))->update(['Status' => '1']);
                return Redirect::route('history.InspectionCheckItemProof', ['id' => $req->input('id')]);
            }
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItemProof_update(Request $req){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItemProof = InspectionCheckItemProof::find($req->input('id'));
            $InspectionCheckItemProof->FileName = $req->input('FileName');
            $InspectionCheckItemProof->Path = $req->input('Path');
            $InspectionCheckItemProof->Type = $req->input('Type');
            $InspectionCheckItemProof->save();
            return Redirect::route('history.index');
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItemProof_delete($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $delete = InspectionCheckItemProof::find($id);

            $file_path = "C:\\xampp\htdocs\\power\public\uploads\\" . $delete->FileName . "." . $delete->Type;
            File::delete($file_path);
            //return  $file_path;
            InspectionCheckItemProof::find($id)->delete();
            return Redirect::route('history.InspectionCheckItemProof', ['id' => $delete->InspectionWorkNumber]);
        }
        return Redirect::route('login.index');
    }
    public function InspectionCheckItemProof_edit($id){
        if(Auth::guard('power_plant_staffs')->check()) {
            $InspectionCheckItemProof = InspectionCheckItemProof::find($id);
            $PowerPlantStaffs = PowerPlantStaff::all();
            $data = array('PowerPlantStaffs' => $PowerPlantStaffs, 'InspectionCheckItemProof' => $InspectionCheckItemProof);
            return view('history.edit.InspectionCheckItemProof', $data->InspectionWorkNumber);
        }
        return Redirect::route('login.index');
    }
    
}
