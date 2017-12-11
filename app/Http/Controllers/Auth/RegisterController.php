<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\PowerPlantNews;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /*
        $PowerPlanStaffs->PowerPlantDepID    = $req->input('PowerPlantDepID');
        $PowerPlanStaffs->PID                = $req->input('PID');
        $PowerPlanStaffs->Name               = $req->input('Name');
        //$PowerPlanStaffs->Password           = $req->input('Password');
        $PowerPlanStaffs->Password           = bcrypt( $req->input('Password'));
        $PowerPlanStaffs->Titile             = $req->input('Titile');
        $PowerPlanStaffs->Email              = $req->input('Email');
    **/
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'PowerPlantDepID'   => 'required|string',
            'PID'               => 'required|string|unique:users',
            'Name'              => 'required',
            'Email'             => 'required|string|email|max:255|unique:users',
            'Password'          => 'required|string|min:6|confirmed',
            'Titile'            => 'required|string|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return PowerPlantNews::create([
            'PowerPlantDepID' =>  $data['PowerPlantDepID'],
            'PID'             =>  $data['PID'],
            'Name'            =>  $data['Name'],
            'Email'           =>  $data['Email'],
            'Password'        =>  bcrypt($data['Password']),
            'Titile'          => $data['Titile'],
        ]);
    }
}
