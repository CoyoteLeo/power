@extends('layout.app')
@section('content')
<style>
    label.error{
        font-size: 13px;
        color:red;
    }
    input.error{
        color:#a40000;
        border: solid 1px red;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, .7);
    }
</style>
    <div class="row"  style="font-family: Microsoft YaHei">
        <div class="span16">
            <div class="box pattern pattern-sandstone">
                <div class="box-header">
                    <i class="icon-list"></i>
                    <h5>最新消息</h5>
                    <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                        <i class="icon-reorder"></i>
                    </button>
                </div>
                <div class="box-content box-list collapse in">
                    <ul>
                        @foreach ( $News as $new)
                        <li>
							<font color="blue">
								標題：{{$new->Titile}}&nbsp&nbsp
								日期：{{ date('Y-m-d H:i:s',strtotime($new->Date))}}&nbsp&nbsp
                                <br>
								發佈人：{{$new->PowerPlantStaff->Name }}&nbsp&nbsp
								部門：{{$new->PowerPlantDep->Dep }}-{{$new->PowerPlantDep->Class }}
							</font> 
							<!--  <font color="blue">未處理</font>  -->
                            <p class="news-item-preview">{{$new->Content}}</p>
                        </li>
                        @endforeach
                    </ul>

                <div class="box-collapse">
                    <button class="btn btn-box" data-toggle="collapse" data-target=".more-list">
                        Show More
                    </button>
                </div>
                <ul class="more-list collapse out">
                   @foreach ( $SeeNews as $new)
                    <li>
						<font color="green">
							標題：{{$new->Titile}}&nbsp&nbsp
							日期：{{ date('Y-m-d H:i:s',strtotime($new->Date))}}&nbsp&nbsp
                            <br>
							發佈人：{{$new->PowerPlantStaff->Name }}&nbsp&nbsp
							部門：{{$new->PowerPlantDep->Dep }}-{{$new->PowerPlantDep->Class }}
						</font> 
						<!--  <font color="blue">未處理</font>  -->
                        <p class="news-item-preview">{{$new->Content}}</p>
                    </li>
                    @endforeach
                    <li >
                        <div align="right">
                            <a href="{{ url('/record/news_all') }}" class="news-item-title"  >
                                <font color="red">點我看更多</font> 
                            </a>
                        </div>
                    </li>
                </ul>
                </div>
            </div>
        </div>
        {{--<div class="span8">--}}
            {{--<div class="blockoff-left">--}}
                {{--<legend class="lead"><b>罰款通知</b></legend>--}}
                {{--@foreach ( $InspectionCheckItems as $InspectionCheckItem)--}}
                {{--<p>--}}
                    {{--<font size="3" color="black"><b>罰款通知單號：{{ $InspectionCheckItem->InspectionWorkNumber }}</b></font>--}}
                {{--</p>--}}
                {{--<p>--}}
                    {{--<font size="3" color="blue">--}}
                        {{--<b>--}}
                            {{--條款:--}}
                            {{--{{$InspectionCheckItem->Terms->ItemB}}---}}
                            {{--{{$InspectionCheckItem->Terms->ItemL}}--}}
                        {{--</b>--}}
                    {{--</font>--}}
                {{--</p>--}}
                {{--<!----}}
                {{--<p>--}}
                    {{--<font size="3" color="blue"><b>接談日期日期：2017-11-03</b></font>--}}
                {{--</p>--}}
                {{---->--}}
                {{--<p>--}}
                    {{--<font size="3" color="red"><b>罰款金額：{{$InspectionCheckItem->Terms->Fine}} 元</b></font>--}}
                {{--</p>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="row">--}}
        {{--<div class="span8">--}}
            {{--<div class="box-header">--}}
                {{--<i class="icon-folder-open"></i>--}}

                    {{--<h5>查核單號:{{ $worknumber }}   </h5>--}}
            {{--</div>--}}
            {{--<div class="box-content">--}}
                {{--<table  class="table table-hover table-bordered tablesorter">--}}

                    {{--<thead align="center" valign="center">--}}
                        {{--<tr>--}}
                            {{--@foreach ( $CheckRecordItems as $CheckRecordItem)--}}
                            {{--<td colspan="2"><b>查核地點：{{$CheckRecordItem->Area}}</b></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td colspan="2"><b>查核人員：{{$CheckRecordItem->PowerPlantStaff->Titile}}</b></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td colspan="2">說明：{{$CheckRecordItem->Content}}</td>--}}
                        {{--</tr>--}}
                        {{--@endforeach--}}

                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<th>改善前</th>--}}
                            {{--<th>改善後</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody align="center" valign="center">--}}
                        {{--<tr>--}}
                        {{--@foreach ( $CheckRecordItemProofs as $CheckRecordItemProof)--}}
                            {{--<td rowspan="3" width="50%">--}}
                                {{--<a href="{{ asset("uploads/$CheckRecordItemProof->FileName.$CheckRecordItemProof->Type") }}">--}}
                                {{--<img src={{ asset("uploads/$CheckRecordItemProof->FileName.$CheckRecordItemProof->Type") }} --}}
                                {{--width="300px" height="300px">--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        {{--@endforeach--}}
                        {{----}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@if (!($worknumber==='無任何查核單號'))--}}
        {{--<div class="span8" >--}}
            {{--<div class="box-header">--}}
                {{--<i class="icon-folder-open"></i>--}}
                    {{--<h5>查核單號:{{ $worknumber }}   改善前畫面</h5>--}}
            {{--</div>--}}
			{{--<form action="{{ url('/record/insert') }}" method="post" enctype="multipart/form-data" id="Power">--}}
				{{--{{ csrf_field() }}--}}
				{{--<div class="box-content">--}}
					{{--<table  class="table table-hover table-bordered tablesorter">--}}

					{{--<input type="hidden" name="PowerPlantStaffid" value="{{ $id }}">--}}
					{{--<input type="hidden" name="CheckRecordWorkNumber" value="{{ $worknumber }}">--}}
					{{--<thead align="center" valign="center">--}}
						{{--<tr>--}}
							{{--<th colspan="2" valign="center">上傳照片按鈕</th>--}}
						{{--</tr>--}}
					{{--</thead>--}}
					{{--<tbody align="center" valign="center">--}}
						{{--<tr>--}}
							{{--<td rowspan="4" width="50%" align="center" valign="center">--}}
								{{--<input type="file" name="file" id="file"><i class="icon-plus-sign icon-large" accept="image/*"></i>--}}
							{{--</td>--}}
						{{--</tr>--}}
						{{--<tr>--}}
							{{--<td style="text-align: right;">--}}
								{{--<input class="btn" type="submit"></input>--}}
							{{--</td>--}}
						{{--</tr>--}}
					{{--</tbody>--}}
				{{----}}
					{{--</table>--}}
				{{--</div>--}}
			{{--</form>--}}
        {{--</div>--}}
        {{--@else--}}
        {{--<div class="spa8" >--}}
            {{--<div class="box-header">--}}
                {{--<i class="icon-folder-open"></i>--}}
                    {{--<h5>查核單號:{{ $worknumber }}   圖片新增</h5>--}}
            {{--</div>--}}
            {{--<div class="box-content">--}}
                {{--<table  class="table table-hover table-bordered tablesorter">--}}
                    {{--<thead align="center" valign="center">--}}
                        {{--<tr>--}}
                            {{--<th colspan="2" valign="center">新增單號</th>--}}
                        {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody align="center" valign="center">--}}
                        {{--<tr>--}}
                            {{--<td colspan="2" width="50%" align="center" valign="center">--}}
                                {{--<a href="{{URL::to('/history') }}" class="btn btn-small btn-danger">新增單號</a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td style="text-align: right;">--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
    </div>
<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#Power").validate({
        rules: {
            file: {
                required: true,
            }
        }, messages: {
            file: {
                required: "請上傳圖片",
            }
        }
    })
</script>
@endsection