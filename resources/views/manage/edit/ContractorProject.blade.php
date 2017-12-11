@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            ContractorProject 承攬商專案
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/ContractorProject/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<input type="hidden" name="id" value="{{$ContractorProjects->id}}">
		            	<tr>
		                    <th>contractorId</th>
		                    <th>
		                    	<select name="contractorId">
		                			@foreach ( $Contractors as $Contractor)
		                				<option value="{{$Contractor->id}}"> {{ $Contractor->CompanyName}}</option>
		                			@endforeach
		                		</select>
		                    </th>
		                </tr>
		                <tr><th>name</th><th><input type="Text" name="name" value="{{$ContractorProjects->name}}"></th></tr>
		                <tr>
		                	<th>Date</th>
		                	<th>
		                		<input type="Date" name="StartDate" value="{{$ContractorProjects->StartDate}}">到
		                		<input type="Date" name="EndDate"   value="{{$ContractorProjects->EndDate}}">
		                	</th>
		                </tr>
		                <tr>
		                	<th>Year</th><th><input type="Text" name="Year" value="{{$ContractorProjects->Year}}"></th>
		                </tr>
		                <tr>
		                	<th>PowerPlantDepID</th>
		                	<th>
		                		<select name="PowerPlantDepID">
		                			@foreach ( $PowerPlantDeps as $PowerPlantDep)
		                				<option value="{{$PowerPlantDep->id}}"> {{ $PowerPlantDep->Dep.'-'.$PowerPlantDep->Class}}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
		                <tr>
		                	<th>PowerPlanStaff</th>
		                	<th>
		                		<select name="PowerPlantStaffID">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                				<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->Titile}}</option>
		                			@endforeach
		                		</select>
		                	</th>
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