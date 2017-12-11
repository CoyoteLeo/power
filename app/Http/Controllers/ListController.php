<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terms;

class ListController extends Controller
{
   public function index()
   {
   		$terms1=Terms::where('ItemB',"墜落")->get();
   		$terms2=Terms::where('ItemB',"感電")->get();
   		$terms3=Terms::where('ItemB',"火災及爆炸")->get();
   		$terms4=Terms::where('ItemB',"中毒及缺氧")->get();
   		$terms5=Terms::where('ItemB',"發生職業災害及重大違規")->get();
   		$terms6=Terms::where('ItemB',"其他")->get();
   		$data = array('terms1' =>  $terms1,'terms2' =>  $terms2,'terms3' =>  $terms3,'terms4' =>  $terms4,'terms5' =>  $terms5,'terms6' =>  $terms6);
   		return view('list.index',$data);
   }
}
