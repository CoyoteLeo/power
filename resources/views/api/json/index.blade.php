@extends('layout.app')
@section('content')
<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>Json格式 資料 表覽</h5>
                <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                    <i class="icon-reorder"></i>
                </button>
            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">供應商Contractor</font> 
                        </a>
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/Contractor') }}">供應商</a>
                            <a href="{{ url('/api/json/ContractorStaff') }}">供應商員工</a>
                            <a href="{{ url('/api/json/ContractorProject') }}">供應商專案</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">電廠PowerPlan</font>    
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/PowerPlantDep') }}">電廠部門</a>
                            <a href="{{ url('/api/json/PowerPlantStaff') }}">電廠員工</a>
                            <a href="{{ url('/api/json/PowerPlantNews') }}">最新消息</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核紀錄CheckRecord</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/CheckRecord') }}">查核紀錄</a>
                            <a href="{{ url('/api/json/CheckRecord') }}">查核紀錄項目</a>
                            <a href="{{ url('/api/json/CheckRecordItemProof') }}">查核紀錄項目佐證資料</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核巡視Insepction</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/Inspection') }}">查核巡視</a>
                            <a href="{{ url('/api/json/InspectionCheckItem') }}">查核巡視項目</a>
                            <a href="{{ url('/api/json/InspectionSpec') }}">查核巡視項目規格</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">安全衛生條款</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/Terms') }}">安全衛生條款</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">報表</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/ContractorViolationRecode') }}">承攬商違規紀錄</a>
                            <a href="{{ url('/api/json/ContractorViolationRank') }}">承攬商違規排名</a>
                            <a href="{{ url('/api/json/ListViolationRecode') }}">特定條規違規紀錄</a>
                            <a href="{{ url('/api/json/EngineeringSafetyViolationRank') }}">工安違規排名</a>
                            <a href="{{ url('/api/json/DepartmentViolationRank') }}">違規部門排名</a>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">Json 資料上傳</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/CheckRecord/insert') }}">查核紀錄</a>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">OperationSpec 資料下載</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/json/OperationSpecCategory') }}">OperationSpecCategory</a>
                            <a href="{{ url('/api/json/OperationSpecType') }}">OperationSpecType</a>
                            <a href="{{ url('/api/json/OperationSpecItem') }}">OperationSpecItem</a>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">資料上傳</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/upload/OperationSpecCategory') }}">OperationSpecCategory</a>

                            <a href="{{ url('/api/upload/OperationSpecType') }}">OperationSpecType</a>
                            <a href="{{ url('/api/upload/OperationSpecItem') }}">OperationSpecItem</a>
                            <br>
                            <a href="{{ url('/api/upload/Inspection') }}">Inspection</a>
                            <a href="{{ url('/api/upload/InspectionCheckItem') }}">InspectionCheckItem</a>
                            <a href="{{ url('/api/upload/InspectionCheckItemProof') }}">InspectionCheckItemProof</a>
                            <a href="{{ url('/api/upload/InspectionSpec') }}">InspectionSpec</a>
                            <br>
                            <a href="{{ url('/api/upload/CheckRecord') }}">CheckRecord</a>
                            <a href="{{ url('/api/upload/CheckRecordItem') }}">CheckRecordItem</a>
                            <a href="{{ url('/api/upload/CheckRecordItemProof') }}">CheckRecordItemProof</a>
                            <a href="{{ url('/api/upload/CheckRecordStaffs') }}">CheckRecordStaffs</a>
                            <br>
                            <a href="{{ url('/api/upload/CheckRecordTotal') }}">CheckRecordTotal</a>
                            <a href="{{ url('/api/upload/InspectionTotal') }}">InspectionTotal</a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection