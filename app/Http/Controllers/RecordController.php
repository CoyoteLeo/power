<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use App\PowerPlantNews;
use App\PowerPlantStaff;
use App\ContractorProject;
use App\CheckRecordItem;
use App\CheckRecordItemProof;
use App\InspectionCheckItem;
use App\Inspection;

Use Redirect;
class RecordController extends Controller
{
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
            $News=PowerPlantNews::offset(0)->limit(3)->orderBy('id', 'desc')->get();
            $SeeNews=PowerPlantNews::offset(3)->limit(2)->orderBy('id', 'desc')->get();
            $data=array('News' => $News, 'SeeNews' => $SeeNews);
            return view('record.index', $data);
        }
        
    }
    public function Recored_insert(Request $req){
        if(Input::hasFile('file')){
            $search="'".$req->input('CheckRecordWorkNumber')."'" ;
            $count=CheckRecordItemProof::selectRaw('count(*) as count')->whereRaw("[CheckRecordWorkNumber]=".$search ) ->first();
            //return $count;
            if($count->count==0){
                $index=0;
            }else{
                $count=CheckRecordItemProof::whereRaw("[CheckRecordWorkNumber]=".$search)->orderBy('Index', 'desc')->first();
                $index=$count->count+1;
            }
            $CheckRecordItemProof=new CheckRecordItemProof;
            $CheckRecordItemProof->CheckRecordWorkNumber =$req->input('CheckRecordWorkNumber');
            $CheckRecordItemProof->CheckRecordIndex      =$index;
            $CheckRecordItemProof->Index                 =$index;

            $file = Input::file('file');
            //$CheckRecordItemProof->Path                  =$file->getRealPath();
            $CheckRecordItemProof->Path                  ='uploads';
            $file->move('uploads', $req->input('CheckRecordWorkNumber').$index.$index.".".$file->getClientOriginalExtension());
            $CheckRecordItemProof->Type                  =$file->getClientOriginalExtension();
            $CheckRecordItemProof->FileName              =$req->input('CheckRecordWorkNumber').$index.$index;
            $CheckRecordItemProof->save();


            return Redirect::route('Record');
        } 

    }
    public function news_detial($id){
    	$News=PowerPlantNews::find($id);
    	$data=array('News' => $News);
    	return view('record.index', $data);
    }
    public function news_All(){
        $News=PowerPlantNews::all();
    	return view('record.news_all', array('News' => $News) );
    }
}
