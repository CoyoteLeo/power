@extends('layout.app')
@section('content')
<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>Csv 資料庫 表覽</h5>
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
                            <a href="{{ url('/api/csv/download/Contractor') }}">供應商</a>
                            <a href="{{ url('/api/csv/download/ContractorStaff') }}">供應商員工</a>
                            <a href="{{ url('/api/csv/download/ContractorProject') }}">供應商專案</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">電廠PowerPlant</font>    
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/PowerPlantDep') }}">電廠部門</a>
                            <a href="{{ url('/api/csv/download/PowerPlantStaff') }}">電廠員工</a>
                            <a href="{{ url('/api/csv/download/PowerPlantNews') }}">最新消息</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核紀錄CheckRecord</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/CheckRecord') }}">查核紀錄</a>
                            <a href="{{ url('/api/csv/download/CheckRecordItem') }}">查核紀錄項目</a>
                            <a href="{{ url('/api/csv/download/CheckRecordItemProof') }}">查核紀錄項目佐證資料</a>
                            <a href="{{ url('/api/csv/download/CheckRecordStaff') }}">查核紀錄員工</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">查核巡視Insepction</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/Inspection') }}">查核巡視</a>
                            <a href="{{ url('/api/csv/download/InspectionCheckItem') }}">查核巡視項目</a>
                            <a href="{{ url('/api/csv/download/InspectionCheckItemProof') }}">查核巡視項目佐證資料</a>
                            <a href="{{ url('/api/csv/download/InspectionSpec') }}">查核巡視項目規格</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">安全衛生條款</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/Terms') }}">安全衛生條款</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">Operation</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/OperationSpecCategory') }}">OperationSpecCategory</a>
                            <a href="{{ url('/api/csv/download/OperationSpecType') }}">OperationSpecType</a>
                            <a href="{{ url('/api/csv/download/OperationSpecItem') }}">OperationSpecItem</a>
                        </p>
                    </li>
                    <li>
                        <a href="#" class="news-item-title">
                            <font color="green">報表</font>            
                        </a> 
                        <p class="news-item-preview">
                            <a href="{{ url('/api/csv/download/ContractorViolationRecode') }}">承攬商違規紀錄</a>
                            <a href="{{ url('/api/csv/download/ContractorViolationRank') }}">承攬商違規排名</a>
                            <a href="{{ url('/api/csv/download/ListViolationRecode') }}">特定條規違規紀錄</a>
                            <a href="{{ url('/api/csv/download/EngineerSafetyViolationRank') }}">工安違規排名</a>
                            <a href="{{ url('/api/csv/download/DepartmentViolationRank') }}">違規部門排名</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>Csv 檔案上傳</h5>
                <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                    <i class="icon-reorder"></i>
                </button>
            </div>
            <div class="box-content box-list collapse in">
                <div class="box-content box-table">
                    <table id="sample-table" class="table table-hover table-bordered tablesorter">
                        <thead>
                            <tr>
                                <form action="{{ url('/api/csv/upload/Contractor') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>供應商Contractor</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/ContractorStaff') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>供應商員工ContractorStaff</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>


                            <tr>
                                <form action="{{ url('/api/csv/upload/PowerPlantDep') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>電廠部門PowerPlantDep</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/PowerPlantStaff') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>電廠員工PowerPlantStaff</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/PowerPlantNews') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>最新消息PowerPlantNews</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/ContractorProject') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>供應商專案ContractorProject</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/OperationSpecType') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>OperationSpecType</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>                            
                            <tr>
                                <form action="{{ url('/api/csv/upload/OperationSpecCategory') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>OperationSpecCategory</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/OperationSpecItem') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>OperationSpecItem</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/CheckRecord') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核紀錄CheckRecord</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/CheckRecordItem') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核紀錄項目CheckRecordItem</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/CheckRecordItemProof') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核紀錄項目佐證資料CheckRecordItemProof</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/CheckRecordStaff') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核紀錄員工CheckRecordStaff</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>

                            <tr>
                                <form action="{{ url('/api/csv/upload/Inspection') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核巡視Inspection</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/InspectionCheckItem') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核巡視項目InspectionCheckItem</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/InspectionCheckItemProof') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核巡視項目佐證資料InspectionCheckItemProof</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>
                            <tr>
                                <form action="{{ url('/api/csv/upload/InspectionSpec') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>查核巡視項目規格InspectionSpec</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>

                            <tr>
                                <form action="{{ url('/api/csv/upload/Terms') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}    
                                <th>安全衛生條款Terms</th><th><input type="file" name="file" id="file"></th>
                                <th><input type="submit" name=""></th>
                                </form> 
                            </tr>

                        </thead>
                    </table>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection