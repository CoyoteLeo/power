@extends('layout.app')
@section('content')
PowerPlantStaff 電廠員工
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            PowerPlantStaff 電廠員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/PowerPlantStaff/update') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<tr>
		            		<th>PowerPlantStaff</th>
		            		<th>
		            			<input type="hidden" name="id" value="{{$PowerPlantStaffs->id}}">
		            			<select name="PowerPlantDepID">
		                			@foreach ( $PowerPlantDeps as $PowerPlantDep)
		                			<option value="{{$PowerPlantDep->id}}"> {{ $PowerPlantDep->Dep.'-'.$PowerPlantDep->Class }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text"     name="PID"          value="{{$PowerPlantStaffs->PID}}"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text"     name="Name"         value="{{$PowerPlantStaffs->Name}}"></th></tr>
	                    <tr><th>密碼</th><th>       <input type="password" name="password"     value="{{$PowerPlantStaffs->password}}"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text"     name="Titile"       value="{{$PowerPlantStaffs->Titile}}"></th></tr>
	                    <tr><th>Email</th><th>      <input type="Text"     name="Email"        value="{{$PowerPlantStaffs->Email}}"></th></tr>
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