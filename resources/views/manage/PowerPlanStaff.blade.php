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
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>PID</th>
		                    <th>Name</th>
		                    <th>password</th>
		                    <th>PowerPlantDepID</th>
		                    <th>Titile</th>
		                    <th>Email</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>

		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $PowerPlanStaffs as $PowerPlanStaff)
		                <tr>
		                    <td>{{ $PowerPlanStaff->id }}</td>
		                    <td>{{ $PowerPlanStaff->PID }}</td>
		                    <td>{{ $PowerPlanStaff->Name }}</td>
		                    <td>{{ $PowerPlanStaff->password }}</td>
		                    <td>{{ $PowerPlanStaff->PowerPlantDep->Dep }}-{{ $PowerPlanStaff->PowerPlantDep->Class }}</td>
		                    <td>{{ $PowerPlanStaff->Titile }}</td>
		                    <td>{{ $PowerPlanStaff->Email }}</td>
		                    <td>{{ $PowerPlanStaff->created_at }}</td>
							<td>{{ $PowerPlanStaff->updated_at }}</td>
		                    <td class="td-actions">
								<a href="{{URL::to('/manage/PowerPlanStaff/edit/'.$PowerPlanStaff->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/PowerPlanStaff/delete/'.$PowerPlanStaff->id) }}" class="btn btn-small btn-danger">
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
		            PowerPlanStaff 電廠員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/PowerPlanStaff/insert') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<tr>
		            		<th>PowerPlanStaff</th>
		            		<th>
		            			<select name="PowerPlantDepID">
		                			@foreach ( $PowerPlanDeps as $PowerPlanDep)
		                			<option value="{{$PowerPlanDep->id}}"> {{ $PowerPlanDep->Dep.'-'.$PowerPlanDep->Class }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text" name="PID"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text" name="Name"></th></tr>
	                    <tr><th>密碼</th><th>       <input type="password" name="password"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text" name="Titile"></th></tr>
	                    <tr><th>Email</th><th>      <input type="Text" name="Email"></th></tr>
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