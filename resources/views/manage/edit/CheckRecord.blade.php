@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            CheckRecord 查核紀錄
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/CheckRecord/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<input type="hidden" name="id" value="{{$CheckRecords->id}} ">
		            <thead>
		                <tr>
		                    <th>日期</th>
		                    <th><input type="Date" name="Date" value="{{$CheckRecords->Date}}">-
		                    	<input type="Time" name="Time" value="{{date('H:i:s',strtotime($CheckRecords->Time)) }}"></th> 
		                </tr>
		                <tr>
		                    <th>單號</th>
		                    <th>{{$CheckRecords->CheckRecordWorkNumber}}</th> 
		                </tr>
		                <tr>

		                	<th>員工編號</th>
		                	<th>
		                		<select name="PowerPlantStaffID">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                			<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->id.'-'.$PowerPlantStaff->Titile }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
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
@endsection