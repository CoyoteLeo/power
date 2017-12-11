<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use App\PowerPlantDep;
use App\PowerPlantStaff;


Use Redirect;
class LoginController extends Controller{
    public function Querypassword(){
        return view('login.Querypassword');
    }
    public function Email(Request $req){

        $PowerPlantStaff=PowerPlantStaff::Where('Email',$req->Email);
        foreach($PowerPlantStaff as $PowerPlant){
            PowerPlantStaff::Where('Email',$req->Email)->update('Email',str_replace('@taipower.com.tw','',substr($req->Email,1)));
        }
        return Redirect::route('login.index');
    }
    public function index() {
//        foreach ( Session::all() as $key=>$value){
//            if($key != '_token') {Session::forget($key);}
//        }

        if(Auth::guard('power_plant_staffs')->check()){
            //dd(Auth::user());
            return Redirect::route('Record');
        }else{
            return view('login.index');
        }
    }

    public function Login(Request $req){
        if (Auth::guard('power_plant_staffs')->attempt(['Email' => $req->input('Email'),'Password' => $req->input('password') ])) {
            return Redirect::route('login.index');
        }else{
            return Redirect::route('login.index');
        }
    }
    public function Logout(){
        Auth::guard('power_plant_staffs')->logout();
        return Redirect::route('login.index');
    }
    public function Regiser(){
        $PowerPlantDeps   = PowerPlantDep::all();
        $PowerPlantStaffs = PowerPlantStaff::all();
        $data= array('PowerPlantDeps' => $PowerPlantDeps ,'PowerPlantStaffs' => $PowerPlantStaffs );
        return view('login.register',$data);
    }
    public function Regiser_insert(Request $req){
        $PowerPlantStaffs=new PowerPlantStaff;
        $PowerPlantStaffs->PowerPlantDepID    = $req->input('PowerPlantDepID');
        $PowerPlantStaffs->PID                = $req->input('PID');
        $PowerPlantStaffs->Name               = $req->input('Name');
        $PowerPlantStaffs->password           = $req->input('password');
        $PowerPlantStaffs->Titile             = $req->input('Titile');
        $PowerPlantStaffs->Email              = $req->input('Email');
        $PowerPlantStaffs->save();
        return Redirect::route('login.index');
    }
}
