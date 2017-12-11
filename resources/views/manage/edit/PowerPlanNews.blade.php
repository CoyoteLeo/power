@extends('layout.app')
@section('content')
PowerPlanNews 最新消息
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            PowerPlanNews 最新消息
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlanNews/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<input type="hidden" name="id" value="{{ $PowerPlanNews->id }}">
		            <thead>
		                <tr><th>Titile</th><th><input type="Text" name="Titile" value="{{ $PowerPlanNews->Titile }}"></th></tr>
		                <tr><th>Content</th><th><TEXTAREA  rows="5" cols="60"  name="Content">{{ $PowerPlanNews->Content }}</TEXTAREA></th></tr>
		                <tr><th>Date</th>
		                	<th>

		                		<input type="date" name="Date" value="{{date('Y-m-d',strtotime($PowerPlanNews->Date)) }}">
		                		<input type="time" name="Time" value="{{date('H:i:s',strtotime($PowerPlanNews->Date)) }}" />
		                	</th>
		                </tr>
		                <tr><th>PowerPlantStaffId</th>
		                	<th>
		                		<select name="PowerPlantStaffId">
		                			@foreach ( $PowerPlanStaffs as $PowerPlanStaff)
		                			<option value="{{$PowerPlanStaff->id}}"> {{ $PowerPlanStaff->Titile}}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
		                <tr>
		                	<th>PowerPlantDepId</th>
		                	<th>
		                		<select name="PowerPlantDepId">
		                			@foreach ( $PowerPlanDeps as $PowerPlanDep)
		                			<option value="{{$PowerPlanDep->id}}"> {{ $PowerPlanDep->Dep.'-'.$PowerPlanDep->Class }}</option>
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