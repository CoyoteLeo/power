<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//, 'before'=>'auth'
Route::get('/', function()
{
    return View('login.index');
});
Route::get('/'                    		, 'LoginController@index')->name('login.index');
Route::get('/login'               		, 'LoginController@index');
Route::post('/login/login'              , 'LoginController@Login');
Route::get('/login/register'      		, 'LoginController@Regiser');
Route::post('/login/register/insert'    , 'LoginController@Regiser_insert');
Route::get('/login/QueryPassword' 		, 'LoginController@QueryPassword');
Route::Post('/login/Email' 				, 'LoginController@Email');
Route::post('/login/logout'				, 'LoginController@Logout');

Route::get('/Q', 'HistoryController@Word');
/*
Route::group(['prefix'=>''], function(){
	Route::get('/'             , 'HomeController@index')->name('home');
	Route::get('/QueryPassword', 'HomeController@QueryPassword');
	//Route::get('/login'        , 'HomeController@login');
	//Route::get('/logout'       , 'HomeController@logout');
});
*/
Route::group(['prefix'=>'char'],function(){
	Route::get('/'                           , 'CharController@index')->name('char');
	Route::get('/ListViolationRecord'        , 'CharController@ListViolationRecord_bar');
	Route::get('/EngineerSafetyViolationRank', 'CharController@EngineerSafetyViolationRank_bar');
	Route::get('/ContractorViolationRecord'  , 'CharController@ContractorViolationRecord_bar');
	Route::get('/ContractorViolationRank'	 , 'CharController@ContractorViolationRank_bar');
	Route::get('/DepartmentViolationRank'	 , 'CharController@DepartmentViolationRank_bar');
});

Route::group(['prefix'=>'history'],function(){
	Route::get('/', 'HistoryController@index')->name('history.index');

	Route::post('/Inspection/insert'				     ,'HistoryController@Inspection_insert');
	Route::get ('/Inspection/delete/{id}'		         ,'HistoryController@Inspection_delete');

    Route::get ('/InspectionCheckItemAll'			     ,'HistoryController@InspectionCheckItemAll') ->name('history.InspectionCheckItemAll');
	Route::get ('/InspectionCheckItem/{id}'			     ,'HistoryController@InspectionCheckItem') ->name('history.InspectionCheckItem');
	Route::post('/InspectionCheckItem/insert'			 ,'HistoryController@InspectionCheckItem_insert') ;
	Route::get ('/InspectionCheckItem/delete/{id}'       ,'HistoryController@InspectionCheckItem_delete');
	Route::get ('/InspectionCheckItemProof/{id}'		 ,'HistoryController@InspectionCheckItemProof') ->name('history.InspectionCheckItemProof');
    Route::get ('/InspectionCheckItem/print/{index}'		,'HistoryController@InspectionCheckItemPrint');

	Route::post('/InspectionCheckItemProof/insert'       ,'HistoryController@InspectionCheckItemProof_insert');
	Route::get ('/InspectionCheckItemProof/delete/{id}'  ,'HistoryController@InspectionCheckItemProof_delete');

    Route::get('/CheckRecordItemAll'					     ,'HistoryController@CheckRecordItemAll')  ->name('history.CheckRecordItemAll');
	Route::post('/CheckRecord/insert'					 ,'HistoryController@CheckRecord_insert');
	Route::get ('/CheckRecord/delete/{id}'		         ,'HistoryController@CheckRecord_delete');
	Route::get ('/CheckRecordItem/{id}'					 ,'HistoryController@CheckRecordItem')     ->name('history.CheckRecordItem');
	Route::post('/CheckRecordItem/insert' 				 ,'HistoryController@CheckRecordItem_insert');
	Route::get ('/CheckRecordItem/edit/{id}'			 ,'HistoryController@CheckRecordItem_edit');
	Route::post('/CheckRecordItem/update'				 ,'HistoryController@CheckRecordItem_update');
	Route::get ('/CheckRecordItem/delete/{id}'			 ,'HistoryController@CheckRecordItem_delete');
    Route::get ('/CheckRecordItem/print/{id}/{index}'			 ,'HistoryController@CheckRecordItemPrint');

	Route::get ('/CheckRecordItemProof/{id}/{index}'			 ,'HistoryController@CheckRecordItemProof')->name('history.CheckRecordItemProof');
	Route::post ('/CheckRecordItemProof/insert'			 ,'HistoryController@CheckRecordItemProof_insert');
	Route::get ('/CheckRecordItemProof/delete/{id}'		 ,'HistoryController@CheckRecordItemProof_delete');
});

Route::group(['prefix'=>'record'],function(){
	Route::get('/','RecordController@index')->name('Record');
	Route::post('/insert','RecordController@Recored_insert');
	Route::get('/news_all','RecordController@news_all');
});

Route::group(['prefix'=>'list'], function(){
	Route::get('/','ListController@index')->name('List');
});

//Manage
Route::group(['prefix'=>'manage'], function(){
	Route::get ('/'									   , 'ManageController@index')->name('manage.index');
	
	Route::get ('/PowerPlantDep/'					   , 'ManageController@PowerPlantDep')->name('PowerPlantDep.index');
	Route::post('/PowerPlantDep/insert'				   , 'ManageController@PowerPlantDep_insert');
	Route::post('/PowerPlantDep/update'				   , 'ManageController@PowerPlantDep_update');
	Route::get ('/PowerPlantDep/delete/{id}'		   , 'ManageController@PowerPlantDep_delete');
	Route::get ('/PowerPlantDep/edit/{id}'			   , 'ManageController@PowerPlantDep_edit');

	Route::get ('/PowerPlantNews'					   , 'ManageController@PowerPlantNews')->name('PowerPlantNews.index');
	Route::post('/PowerPlantNews/insert'			   , 'ManageController@PowerPlantNews_insert');
	Route::post('/PowerPlantNews/update'			   , 'ManageController@PowerPlantNews_update');
	Route::get ('/PowerPlantNews/delete/{id}'		   , 'ManageController@PowerPlantNews_delete');
	Route::get ('/PowerPlantNews/edit/{id}'			   , 'ManageController@PowerPlantNews_edit');

	Route::get ('/PowerPlantStaff'					   , 'ManageController@PowerPlantStaff')->name('PowerPlantStaff.index');
	Route::post('/PowerPlantStaff/insert'			   , 'ManageController@PowerPlantStaff_insert');
	Route::post('/PowerPlantStaff/update'			   , 'ManageController@PowerPlantStaff_update');
	Route::get ('/PowerPlantStaff/delete/{id}'		   , 'ManageController@PowerPlantStaff_delete');
	Route::get ('/PowerPlantStaff/edit/{id}'		   , 'ManageController@PowerPlantStaff_edit');

	Route::get ('/Contractor'						   , 'ManageController@Contractor')->name('Contractor.index');
	Route::post('/Contractor/insert'				   , 'ManageController@Contractor_insert');
	Route::post('/Contractor/update'				   , 'ManageController@Contractor_update');
	Route::get ('/Contractor/delete/{id}'			   , 'ManageController@Contractor_delete');
	Route::get ('/Contractor/edit/{id}'				   , 'ManageController@Contractor_edit');


	Route::get ('/ContractorProject'				   , 'ManageController@ContractorProject')->name('ContractorProject.index');
	Route::post('/ContractorProject/insert'			   , 'ManageController@ContractorProject_insert');
	Route::post('/ContractorProject/update'			   , 'ManageController@ContractorProject_update');
	Route::get ('/ContractorProject/delete/{id}'	   , 'ManageController@ContractorProject_delete');
	Route::get ('/ContractorProject/edit/{id}'		   , 'ManageController@ContractorProject_edit');

	Route::get ('/ContractorStaff'             		   , 'ManageController@ContractorStaff')->name('ContractorStaff.index');
	Route::post('/ContractorStaff/insert'              , 'ManageController@ContractorStaff_insert');
	Route::post('/ContractorStaff/update'              , 'ManageController@ContractorStaff_update');
	Route::get ('/ContractorStaff/delete/{id}'         , 'ManageController@ContractorStaff_delete');
	Route::get ('/ContractorStaff/edit/{id}'		   , 'ManageController@ContractorStaff_edit');

	Route::get ('/CheckRecord'                         , 'ManageController@CheckRecord')->name('CheckRecord.index');
	Route::post('/CheckRecord/insert'				   , 'ManageController@CheckRecord_insert');
	Route::post('/CheckRecord/update'				   , 'ManageController@CheckRecord_update');
	Route::get ('/CheckRecord/delete/{id}'			   , 'ManageController@CheckRecord_delete');
	Route::get ('/CheckRecord/edit/{id}'			   , 'ManageController@CheckRecord_edit');


	Route::get ('/CheckRecordStaff'					   , 'ManageController@CheckRecordStaff')->name('CheckRecordStaff.index');
	Route::post('/CheckRecordStaff/insert'			   , 'ManageController@CheckRecordStaff_insert');
	Route::post('/CheckRecordStaff/update'  	       , 'ManageController@CheckRecordStaff_update');
	Route::get ('/CheckRecordStaff/delete/{id}'		   , 'ManageController@CheckRecordStaff_delete');
	Route::get ('/CheckRecordStaff/edit/{id}'		   , 'ManageController@CheckRecordStaff_edit');

	Route::get ('/CheckRecordItem'					   , 'ManageController@CheckRecordItem')->name('CheckRecordItem.index');
	Route::post('/CheckRecordItem/insert'			   , 'ManageController@CheckRecordItem_insert');
	Route::post('/CheckRecordItem/update'  	   		   , 'ManageController@CheckRecordItem_update');
	Route::get ('/CheckRecordItem/delete/{id}'		   , 'ManageController@CheckRecordItem_delete');
	Route::get ('/CheckRecordItem/edit/{id}'		   , 'ManageController@CheckRecordItem_edit');

	Route::get ('/CheckRecordItemProof'                , 'ManageController@CheckRecordItemProof')->name('CheckRecordItemProof.index');
	Route::post('/CheckRecordItemProof/insert'         , 'ManageController@CheckRecordItemProof_insert');
	Route::post('/CheckRecordItemProof/update'         , 'ManageController@CheckRecordItemProof_update');
	Route::get ('/CheckRecordItemProof/delete/{id}'    , 'ManageController@CheckRecordItemProof_delete');
	Route::get ('/CheckRecordItemProof/edit/{id}'      , 'ManageController@CheckRecordItemProof_edit');

	Route::get ('/Inspection'                          , 'ManageController@Inspection')->name('Inspection.index');
	Route::post('/Inspection/insert'                   , 'ManageController@Inspection_insert');
	Route::post('/Inspection/update'                   , 'ManageController@Inspection_update');
	Route::get ('/Inspection/delete/{id}'              , 'ManageController@Inspection_delete');
	Route::get ('/Inspection/edit/{id}'                , 'ManageController@Inspection_edit');

	Route::get ('/InspectionSpec'                      , 'ManageController@InspectionSpec')->name('InspectionSpec.index');
	Route::post('/InspectionSpec/insert'               , 'ManageController@InspectionSpec_insert');
	Route::post('/InspectionSpec/update'               , 'ManageController@InspectionSpec_update');
	Route::get ('/InspectionSpec/delete/{id}'          , 'ManageController@InspectionSpec_delete');
	Route::get ('/InspectionSpec/edit/{id}'            , 'ManageController@InspectionSpec_edit');


	Route::get ('/InspectionCheckItem'                 , 'ManageController@InspectionCheckItem')->name('InspectionCheckItem.index');
	Route::post('/InspectionCheckItem/insert'          , 'ManageController@InspectionCheckItem_insert');
	Route::post('/InspectionCheckItem/update'          , 'ManageController@InspectionCheckItem_update');
	Route::get ('/InspectionCheckItem/delete/{id}'     , 'ManageController@InspectionCheckItem_delete');
	Route::get ('/InspectionCheckItem/edit/{id}'       , 'ManageController@InspectionCheckItem_edit');	

	Route::get ('/InspectionCheckItemProof'            , 'ManageController@InspectionCheckItemProof')->name('InspectionCheckItemProof.index');
	Route::post('/InspectionCheckItemProof/insert'     , 'ManageController@InspectionCheckItemProof_insert');
	Route::post('/InspectionCheckItemProof/update'     , 'ManageController@InspectionCheckItemProof_update');
	Route::get ('/InspectionCheckItemProof/delete/{id}', 'ManageController@InspectionCheckItemProof_delete');
	Route::get ('/InspectionCheckItemProof/edit/{id}'  , 'ManageController@InspectionCheckItemProof_edit');	
	// Ok
	Route::get ('/Terms'							   , 'ManageController@Terms')->name('Terms.index');
	Route::post('/Terms/insert'						   , 'ManageController@Terms_insert');
	Route::post('/Terms/update'						   , 'ManageController@Terms_update');
	Route::get ('/Terms/delete/{id}'				   , 'ManageController@Terms_delete');
	Route::get ('/Terms/edit/{id}'					   , 'ManageController@Terms_edit');
});

Route::group(['prefix'=>'api'],function(){
	Route::get('/csv'    , 'CsvController@index')->name('Csv');
	Route::get('/json'   , 'JsonController@index')->name('Json');
	Route::get('/mobile/', 'MobileController@index')->name('mobile');

//------------------------------------------------------------------------------------------------------------//

	Route::get('/mobile/PowerPlantDep'      		        , 'MobileController@PowerPlantDep');
	Route::get('/mobile/PowerPlantNews'     		    	, 'MobileController@PowerPlantNews');
	Route::get('/mobile/PowerPlantStaff'     		    	, 'MobileController@PowerPlantStaff');
	Route::get('/mobile/Contractor'        			        , 'MobileController@Contractor');
	Route::get('/mobile/ContractorStaff'					, 'MobileController@ContractorStaff');
	Route::get('/mobile/ContractorProject'   				, 'MobileController@ContractorProject');
	Route::get('/mobile/CheckRecord'           		    	, 'MobileController@CheckRecord');
	Route::get('/mobile/CheckRecordItem'       		    	, 'MobileController@CheckRecordItem');
	Route::get('/mobile/CheckRecordItemProof'  		    	, 'MobileController@CheckRecordItemProof');
	Route::get('/mobile/CheckRecordStaff'       	 		, 'MobileController@CheckRecordStaff');
	Route::get('/mobile/Inspection'           		    	, 'MobileController@Inspection');
	Route::get('/mobile/InspectionCheckItem'		    	, 'MobileController@InspectionCheckItem');
	Route::get('/mobile/InspectionCheckItemProof'        	, 'MobileController@InspectionCheckItemProof');
	Route::get('/mobile/InspectionSpec'     		    	, 'MobileController@InspectionSpec');
	Route::get('/mobile/Terms'                  			, 'MobileController@Terms');
	Route::get('/mobile/file'                  				, 'MobileController@File');
	Route::get('/mobile/file_upload' 						, 'MobileController@File_Upload');
//------------------------------------------------------------------------------------------------------------//

	Route::get('/json/CheckRecord/insert'                   , 'JsonController@CheckRecord_json_from');
	Route::post('/json/CheckRecord/insert'                  , 'JsonController@CheckRecord_json_upload');
});


Route::get('/home', 'HomeController@index')->name('home');
