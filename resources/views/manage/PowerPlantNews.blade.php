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
		TEXTAREA.error{
			font-size: 13px;
			color:red;

		}
		TEXTAREA.error{
			color:#a40000;
			border: solid 1px red;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, .7);
		}
	</style>
{{--<div class="row">--}}
	{{--<div class="span16">--}}
		{{--<div class="box pattern pattern-sandstone">--}}
		    {{--<div class="box-header">--}}
		        {{--<i class="icon-table"></i>--}}
		        {{--<h5>--}}
		            {{--最新消息--}}
		        {{--</h5>--}}
		    {{--</div>--}}
		    {{--<div class="box-content box-table">--}}
		        {{--<table id="sample-table" class="table table-hover table-bordered tablesorter">--}}
		            {{--<thead>--}}
		                {{--<tr>--}}
		                    {{--<th>標題 | 日期 | 員工名稱 | 員工部門</th>--}}
		                    {{--<th>創建時間</th>--}}
		                    {{--<th>更新時間</th>--}}
		                    {{--<th class="td-actions"></th>--}}
		                {{--</tr>--}}
		            {{--</thead>--}}
		            {{--<tbody>--}}
		            	{{--@foreach ( $PowerPlantNews as $PowerPlantNew)--}}
		                {{--<tr>--}}
		                    {{--<td>--}}
		                    	 {{--{{ $PowerPlantNew->Titile }} --}}
		                    	 {{--日期：{{ date('Y-m-d H:i:s',strtotime($PowerPlantNew->Date))}} --}}
		                    	 {{--{{ $PowerPlantNew->PowerPlantStaff->Titile }} --}}
		                    	 {{--{{ $PowerPlantNew->PowerPlantDep->Class }}-{{ $PowerPlantNew->PowerPlantDep->Class }}--}}
		                    {{--</td>--}}
		                    {{--<td>{{ $PowerPlantNew->created_at }}</td>--}}
		                    {{--<td>{{ $PowerPlantNew->updated_at }}</td>--}}
		                    {{--<td class="td-actions" rowspan="3">--}}
		                    	{{--<a href="{{URL::to('/manage/PowerPlantNews/edit/'.$PowerPlantNew->id) }}" class="btn btn-small btn-info">--}}
		                            {{--<i class="btn-icon-only icon-pencil"></i>--}}
		                        {{--</a>--}}
		                        {{--<a href="{{URL::to('/manage/PowerPlantNews/delete/'.$PowerPlantNew->id) }}" class="btn btn-small btn-danger">--}}
		                            {{--<i class="btn-icon-only icon-remove"></i>--}}
		                        {{--</a>--}}
		                {{--</tr>--}}

		                {{--<tr>--}}
		                	{{--<td colspan="3"><b>內容</b></td>--}}
		                {{--</tr>--}}
		                {{--<tr>--}}
		                	{{--<td colspan="3">{{ $PowerPlantNew->Content }}</td>--}}
		                {{--</tr>--}}
		                {{--@endforeach--}}
		            {{--</tbody>--}}
		        {{--</table>--}}
		    {{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             最新消息
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlantNews/insert') }}" method="post" id="Power">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr><th>標題</th><th><input type="Text" name="Title" size="100"></th></tr>
		                {{--<tr>--}}
		                	{{--<th >日期</th><th><input type="Date" name="Date"><input type="time" name="time"></th>--}}
		                {{--</tr>--}}
		                <tr>
		                	<th >部門</th>
		                	<th>
		                		{{--<select name="PowerPlantStaffId">--}}
		                			{{--@foreach ( $PowerPlantStaffs as $PowerPlantStaff)--}}
		                			{{--<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->Titile}}</option>--}}
		                			{{--@endforeach--}}
		                		{{--</select>--}}
		                		<select name="PowerPlantDepId">
		                			@foreach ( $PowerPlantDeps as $PowerPlantDep)
		                			<option value="{{$PowerPlantDep->id}}"> {{ $PowerPlantDep->Dep.'-'.$PowerPlantDep->Class }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
		                <tr><th>內容</th><th><TEXTAREA  rows="5" cols="60"  name="Content"></TEXTAREA></th></tr>
		                <tr> 
		            		<td colspan="2"  valign="right" style="text-align: right;" >
		            			<input type="submit" name="">
		            		</td>
		            	</tr>
		            </thead>
		        </table>
		        </form>
		    </div>
		</div>
	</div>
</div>

<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#Power").validate({
        rules: {
            Title: {
                required: true,
            },PowerPlantDepId:{
                required: true,
            },Content:{
                required: true,
			}
        }, messages: {
            Title: {
                required: "請輸入標題",
            },PowerPlantDepId:{
                required: "請選擇部門",
            },Content:{
                required: "請輸入內容",
            }
        }
    })
</script>
@endsection