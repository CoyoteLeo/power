@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             承攬商專案
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>公司名稱</th>
		                    <th>專案編號</th>
		                    <th>時間</th>
		                    <th>年分</th>
		                    <th>負責電廠員工</th>
		                    <th>負責電廠單位</th>
		                    <th>創建時間</th>
		                    <th>更新時間</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ($ContractorProjects as $ContractorProject)
		                <tr>
		                    <td>{{ $ContractorProject->Contractors->CompanyName }}</td>
		                    <td>{{ $ContractorProject->name }}</td>
		                    <td>{{ $ContractorProject->StartDate }}~{{ $ContractorProject->EndDate }}</td>
		                    <td>{{ $ContractorProject->Year }}</td>
		                    <td>{{ $ContractorProject->PowerPlantDep->Dep }}-{{ $ContractorProject->PowerPlantDep->Class }}</td>
		                    <td>{{ $ContractorProject->PowerPlantStaff->Titile }}</td>
		                    <td>{{ $ContractorProject->created_at }}</td>
		                    <td>{{ $ContractorProject->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/ContractorProject/edit/'.$ContractorProject->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/ContractorProject/delete/'.$ContractorProject->id) }}" class="btn btn-small btn-danger">
		                            <i class="btn-icon-only icon-remove"></i>
		                        </a>
		                    </td>
		                </tr>
		                @endforeach
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             承攬商專案
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/ContractorProject/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
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
		                <tr><th>name</th><th><input type="Text" name="name" value=""></th></tr>
		                <tr>
		                	<th>Date</th>
		                	<th>
		                		<input type="Date" name="StartDate" value="">到
		                		<input type="Date" name="EndDate" value="">
		                	</th>
		                </tr>
		                <tr>
		                	<th>Year</th><th><input type="Text" name="Year" value=""></th>
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