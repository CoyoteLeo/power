@extends('layout.app')
@section('content')
<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>mobile上傳連結表覽</h5>
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
                            <a href="{{ url('/api/mobile/Contractor') }}">供應商</a>
                            <a href="{{ url('/api/mobile/ContractorStaff') }}">供應商員工</a>
                            <a href="{{ url('/api/mobile/ContractorProject') }}">供應商專案</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">電廠PowerPlan</font>    
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/PowerPlantDep') }}">電廠部門</a>
                            <a href="{{ url('/api/mobile/PowerPlantStaff') }}">電廠員工</a>
                            <a href="{{ url('/api/mobile/PowerPlantNews') }}">最新消息</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核紀錄CheckRecord</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/CheckRecord') }}">查核紀錄</a>
                            <a href="{{ url('/api/mobile/CheckRecord') }}">查核紀錄項目</a>
                            <a href="{{ url('/api/mobile/CheckRecordItemProof') }}">查核紀錄項目佐證資料</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核巡視Insepction</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/Inspection') }}">查核巡視</a>
                            <a href="{{ url('/api/mobile/InspectionCheckItem') }}">查核巡視項目</a>
                            <a href="{{ url('/api/mobile/InspectionSpec') }}">查核巡視項目規格</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">安全衛生條款</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/Terms') }}">安全衛生條款</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">檔案上傳</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/file') }}">檔案上傳</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">報表</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/mobile/ContractorViolationRecode') }}">承攬商違規紀錄</a>
                            <a href="{{ url('/api/mobile/ContractorViolationRank') }}">承攬商違規排名</a>
                            <a href="{{ url('/api/mobile/ListViolationRecode') }}">特定條規違規紀錄</a>
                            <a href="{{ url('/api/mobile/EngineeringSafetyViolationRank') }}">工安違規排名</a>
                            <a href="{{ url('/api/mobile/DepartmentViolationRank') }}">違規部門排名</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection