@extends('layout.app')
@section('content')
<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
        <div class="box-header">
            <i class="icon-list"></i>
            <h5>管理者 表覽</h5>
            <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                <i class="icon-reorder"></i>
            </button>
        </div>
        <div class="box-content box-list collapse in" style="padding-left: 20px;">
            {{--<ul>--}}
                {{--<li>--}}
                    {{--<a href="#" class="news-item-title">--}}
                        {{--<font color="green">供應商</font> --}}
                    {{--</a>--}}
                    {{--<p class="news-item-preview">--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/Contractor') }}'">供應商</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/ContractorStaff') }}'">供應商員工</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/ContractorProject') }}'">供應商專案</button>--}}
                    {{--</p>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="news-item-title">--}}
                        {{--<font color="green">電廠</font>    --}}
                    {{--</a> --}}
                    {{--<p class="news-item-preview">            --}}
                        {{--<button onclick="window.location.href='{{ url('/manage/PowerPlantDep') }}'" >電廠部門</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/PowerPlantStaff') }}'">電廠員工</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/PowerPlantNews') }}'">最新消息</button>--}}
                    {{--</p>--}}
                {{--</li>--}}
                {{--<!----}}
                {{--<li>--}}
                    {{--<a href="#" class="news-item-title">--}}
                        {{--<font color="green">查核紀錄CheckRecord</font>            --}}
                    {{--</a> --}}
                    {{--<p class="news-item-preview">--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/CheckRecord') }}'">查核紀錄</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/CheckRecordItem') }}'">查核紀錄項目</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/CheckRecordItemProof') }}'">查核紀錄項目佐證資料</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/CheckRecordStaff') }}'">查核紀錄員工</button>--}}
                    {{--</p>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="news-item-title">--}}
                        {{--<font color="green">查核巡視Insepction</font>            --}}
                    {{--</a> --}}
                    {{--<p class="news-item-preview">--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/Inspection') }}'">查核巡視</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/InspectionCheckItem') }}'">查核巡視項目</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/InspectionCheckItemProof') }}'">查核巡視項目佐證資料</button>--}}
                        {{--<button onclick="window.location.href='{{ url('/manage/InspectionSpec') }}'">查核巡視項目規格</button>--}}


                    {{--</p>--}}
                {{--</li>--}}
            {{---->--}}
                <li>
                    <a href="#" class="news-item-title">
                        <font color="green">最新消息</font>
                    </a>
                    <p class="news-item-preview">
                        <div style="padding-left: 20px;">
                            <button onclick="window.location.href='{{ url('/manage/PowerPlantNews') }}'">新增最新消息</button>
                        </div>
                    </p>
                </li>
                <li>
                    <a href="#" class="news-item-title">
                        <font color="green">安全衛生</font>            
                    </a> 
                    <p class="news-item-preview">
                        <div style="padding-left: 20px;">
                            <button onclick="window.location.href='{{ url('/manage/Terms') }}'">安全衛生條款</button>
                        </div>
                    </p>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>
<!--
<div class="row">
    <div class="span16">
        <div class="box">
            <div class="box-header">
                <i class="icon-bookmark"></i>
                <h5>資料表關聯</h5>
            </div>
            <div class="box-content">
                <div class="btn-group-box">
                    <img src="{{asset('images/manage/DatabaseRelationship.png')}}" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection