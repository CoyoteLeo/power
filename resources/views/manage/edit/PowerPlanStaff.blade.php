@extends('layout.app')
@section('content')
PowerPlanStaff 電廠員工
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            PowerPlanStaff 電廠員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/PowerPlanStaff/update') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<tr>
		            		<th>PowerPlanStaff</th>
		            		<th>
		            			<input type="hidden" name="id" value="{{$PowerPlanStaffs->id}}">
		            			<select name="PowerPlantDepID">
		                			@foreach ( $PowerPlanDeps as $PowerPlanDep)
		                			<option value="{{$PowerPlanDep->id}}"> {{ $PowerPlanDep->Dep.'-'.$PowerPlanDep->Class }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text"     name="PID"          value="{{$PowerPlanStaffs->PID}}"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text"     name="Name"         value="{{$PowerPlanStaffs->Name}}"></th></tr>
	                    <tr><th>密碼</th><th>       <input type="password" name="password"     value="{{$PowerPlanStaffs->password}}"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text"     name="Titile"       value="{{$PowerPlanStaffs->Titile}}"></th></tr>
	                    <tr><th>Email</th><th>      <input type="Text"     name="Email"        value="{{$PowerPlanStaffs->Email}}"></th></tr>
	                    <tr><th class="td-actions"></th></tr>
	                	<tr><td colspan="2"  valign="right" style="text-align: right;" >
	            				<input type="submit" name="">
	            			</td>
	            		</tr>
		            </thead>
		            </form>
		        </table>
		    </div>
		</div>
	</div>
</div>
@endsection