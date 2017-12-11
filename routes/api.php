<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('/upload/CheckRecordTotal'						, 'JsonController@CheckRecordTotal_json_upload');
Route::any('/upload/InspectionTotal'						    , 'JsonController@InspectionTotal_json_upload');
Route::any('/moblie/Dep'				                        , 'JsonController@Dep');

Route::any('/upload/Inspection'								, 'JsonController@Inspection_json_upload');
Route::any('/upload/InspectionCheckItem'					, 'JsonController@InspectionCheckItem_json_upload');
Route::any('/upload/InspectionCheckItemProof'				, 'JsonController@InspectionCheckItemProof_json_upload');
Route::any('/upload/InspectionSpec'							, 'JsonController@InspectionSpec_json_upload');

Route::any('/upload/CheckRecord'							, 'JsonController@CheckRecord_json_upload');
Route::any('/upload/CheckRecordItem'						, 'JsonController@CheckRecordItem_json_upload');
Route::any('/upload/CheckRecordItemProof'					, 'JsonController@CheckRecordItemProof_json_upload');
Route::any('/upload/CheckRecordStaffs'						, 'JsonController@CheckRecordStaffs_json_upload');

Route::any('/upload/OperationSpecCategory'					, 'JsonController@OperationSpecCategory_json_upload');
Route::any('/upload/OperationSpecType'						, 'JsonController@OperationSpecType_json_upload');
Route::any('/upload/OperationSpecItem'						, 'JsonController@OperationSpecItem_json_upload');

Route::get('/csv/download/CheckRecord'           			, 'CsvController@CheckRecord_Donwload');
Route::get('/csv/download/CheckRecordItem'       			, 'CsvController@CheckRecordItem_Donwload');
Route::get('/csv/download/CheckRecordItemProof'  			, 'CsvController@CheckRecordItemProof_Donwload');
Route::get('/csv/download/CheckRecordStaff'       			, 'CsvController@CheckRecordStaff_Donwload');
Route::get('/csv/download/ContractorProject'   				, 'CsvController@ContractorProject_Donwload');
Route::get('/csv/download/ContractorStaff'					, 'CsvController@ContractorStaff_Donwload');
Route::get('/csv/download/Contractor'        			    , 'CsvController@Contractor_Donwload');
Route::get('/csv/download/PowerPlantDep'      			    , 'CsvController@PowerPlantDep_Donwload');
Route::get('/csv/download/PowerPlantNews'     		 	    , 'CsvController@PowerPlantNews_Donwload');
Route::get('/csv/download/PowerPlantStaff'     			    , 'CsvController@PowerPlantStaff_Donwload');
Route::get('/csv/download/Inspection'           			, 'CsvController@Inspection_Donwload');
Route::get('/csv/download/InspectionCheckItem'		 	    , 'CsvController@InspectionCheckItem_Donwload');
Route::get('/csv/download/InspectionCheckItemProof'  	    , 'CsvController@InspectionCheckItemProof_Donwload');
Route::get('/csv/download/InspectionSpec'     		   	    , 'CsvController@InspectionSpec_Donwload');
Route::get('/csv/download/Terms'                  		 	, 'CsvController@Terms_Donwload');
Route::get('/csv/download/OperationSpecCategory'            , 'CsvController@OperationSpecCategory_Donwload');
Route::get('/csv/download/OperationSpecType'                , 'CsvController@OperationSpecType_Donwload');
Route::get('/csv/download/OperationSpecItem'                , 'CsvController@OperationSpecItem_Donwload');


Route::get('/csv/download/ContractorViolationRecord'    	, 'CsvController@ContractorViolationRecord_Donwload');
Route::get('/csv/download/ContractorViolationRank'    	    , 'CsvController@ContractorViolationRank_Donwload');
Route::get('/csv/download/ListViolationRecode'          	, 'CsvController@ListViolationRecode_Donwload');
Route::get('/csv/download/EngineerSafetyViolationRank'  	, 'CsvController@EngineerSafetyViolationRank_Donwload');
Route::get('/csv/download/DepartmentViolationRank'  	    , 'CsvController@DepartmentViolationRank_Donwload');

Route::post('/csv/upload/PowerPlantDep'      		    	, 'CsvController@PowerPlantDep_Upload');
Route::post('/csv/upload/PowerPlantNews'     		    	, 'CsvController@PowerPlantNews_Upload');
Route::post('/csv/upload/PowerPlantStaff'     			    , 'CsvController@PowerPlantStaff_Upload');
Route::post('/csv/upload/Contractor'        			    , 'CsvController@Contractor_Upload');
Route::post('/csv/upload/ContractorStaff'					, 'CsvController@ContractorStaff_Upload');
Route::post('/csv/upload/ContractorProject'   				, 'CsvController@ContractorProject_Upload');
Route::post('/csv/upload/CheckRecord'           			, 'CsvController@CheckRecord_Upload');
Route::post('/csv/upload/CheckRecordItem'       			, 'CsvController@CheckRecordItem_Upload');
Route::post('/csv/upload/CheckRecordItemProof'  			, 'CsvController@CheckRecordItemProof_Upload');
Route::post('/csv/upload/CheckRecordStaff'       			, 'CsvController@CheckRecordStaff_Upload');
Route::post('/csv/upload/Inspection'           		   	 	, 'CsvController@Inspection_Upload');
Route::post('/csv/upload/InspectionCheckItem'		   	 	, 'CsvController@InspectionCheckItem_Upload');
Route::post('/csv/upload/InspectionCheckItemProof'      	, 'CsvController@InspectionCheckItemProof_Upload');
Route::post('/csv/upload/InspectionSpec'     		    	, 'CsvController@InspectionSpec_Upload');
Route::post('/csv/upload/Terms'                  			, 'CsvController@Terms_Upload');
Route::post('/csv/upload/OperationSpecCategory'				, 'CsvController@OperationSpecCategory_upload');
Route::post('/csv/upload/OperationSpecType'					, 'CsvController@OperationSpecType_upload');
Route::post('/csv/upload/OperationSpecItem'					, 'CsvController@OperationSpecItem_upload');


//------------------------------------------------------------------------------------------------------------//
Route::post('/mobile/PowerPlantDep'      			        , 'MobileController@PowerPlantDep_Upload');
Route::post('/mobile/PowerPlantNews'     		 		   	, 'MobileController@PowerPlantNews_Upload');
Route::post('/mobile/PowerPlantStaff'     			    	, 'MobileController@PowerPlantStaff_Upload');
Route::post('/mobile/Contractor'        				    , 'MobileController@Contractor_Upload');
Route::post('/mobile/ContractorStaff'						, 'MobileController@ContractorStaff_Upload');
Route::post('/mobile/ContractorProject'   					, 'MobileController@ContractorProject_Upload');
Route::post('/mobile/CheckRecord'           				, 'MobileController@CheckRecord_Upload');
Route::post('/mobile/CheckRecordItem'       				, 'MobileController@CheckRecordItem_Upload');
Route::post('/mobile/CheckRecordItemProof'  				, 'MobileController@CheckRecordItemProof_Upload');
Route::post('/mobile/CheckRecordStaff'       				, 'MobileController@CheckRecordStaff_Upload');
Route::post('/mobile/Inspection'           		    		, 'MobileController@Inspection_Upload');
Route::post('/mobile/InspectionCheckItem'		    		, 'MobileController@InspectionCheckItem_Upload');
Route::post('/mobile/InspectionCheckItemProof'      		, 'MobileController@InspectionCheckItemProof_Upload');
Route::post('/mobile/InspectionSpec'     		    		, 'MobileController@InspectionSpec_Upload');
Route::post('/mobile/Terms'                  				, 'MobileController@Terms_Upload');
Route::post('/mobile/file'									, 'MobileController@File_Upload');
//------------------------------------------------------------------------------------------------------------//
Route::get('/json/CheckRecord'                        		, 'JsonController@CheckRecord_json');
Route::get('/json/CheckRecordItem'                    	  	, 'JsonController@CheckRecordItem_json');
Route::get('/json/CheckRecordItemProof'                 	, 'JsonController@CheckRecordItemProof_json');
Route::get('/json/ContractorProject'                    	, 'JsonController@ContractorProject_json');
Route::get('/json/ContractorStaff'                      	, 'JsonController@ContractorStaff_json');
Route::get('/json/Contractor'                           	, 'JsonController@Contractor_json');
Route::get('/json/PowerPlantDep'                        	, 'JsonController@PowerPlantDep_json');
Route::get('/json/PowerPlantNews'                      		, 'JsonController@PowerPlantNews_json');
Route::get('/json/PowerPlantStaff'                      	, 'JsonController@PowerPlantStaff_json');
Route::get('/json/Inspection'                           	, 'JsonController@Inspection_json');
Route::get('/json/InspectionCheckItem'                  	, 'JsonController@InspectionCheckItem_json');
Route::get('/json/InspectionSpec'                       	, 'JsonController@InspectionSpec_json');
Route::get('/json/Terms'                                	, 'JsonController@Terms_json');

Route::get('/json/OperationSpecCategory'   		   		 	, 'JsonController@OperationSpecCategory_json');
Route::get('/json/OperationSpecType'              			, 'JsonController@OperationSpecType_json');
Route::get('/json/OperationSpecItem'              	    	, 'JsonController@OperationSpecItem_json');


Route::get('/json/ContractorViolationRecode'   		    	, 'JsonController@ContractorViolationRecode_json');
Route::get('/json/ContractorViolationRank'              	, 'JsonController@ContractorViolationRank_json');
Route::get('/json/ListViolationRecode'                  	, 'JsonController@ListViolationRecode_json');

