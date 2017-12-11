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
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>Titile | Date | PowerPlantStaffId | PowerPlantDepId</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $PowerPlanNews as $PowerPlanNew)
		                <tr>
		                    <td>{{ $PowerPlanNew->id }}</td>
		                    <td>
		                    	 {{ $PowerPlanNew->Titile }} 
		                    	 日期：{{ date('Y-m-d H:i:s',strtotime($PowerPlanNew->Date))}} 
		                    	 {{ $PowerPlanNew->PowerPlantStaff->Titile }} 
		                    	 {{ $PowerPlanNew->PowerPlantDep->Class }}-{{ $PowerPlanNew->PowerPlantDep->Class }}
		                    </td>
		                    <td>{{ $PowerPlanNew->created_at }}</td>
		                    <td>{{ $PowerPlanNew->updated_at }}</td>
		                    <td class="td-actions">
		                    	<a href="{{URL::to('/manage/PowerPlanNews/edit/'.$PowerPlanNew->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/PowerPlanNews/delete/'.$PowerPlanNew->id) }}" class="btn btn-small btn-danger">
		                            <i class="btn-icon-only icon-remove"></i>
		                        </a>
		                </tr>

		                <tr>
		                	<td><b>Content</b></td>
		                	<td colspan="4">{{ $PowerPlanNew->Content }}</td>
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
		            PowerPlanNews 最新消息
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlanNews/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr><th>Titile</th><th><input type="Text" name="Titile"></th></tr>
		                <tr><th>Content</th><th><TEXTAREA  rows="5" cols="60"  name="Content"></TEXTAREA></th></tr>
		                <tr><th>Date</th><th><input type="Date" name="Date"><input type="time" name="time"></th></tr>
		                <tr>
		                	<th>PowerPlantStaffId</th>
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