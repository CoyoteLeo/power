@extends('layout.app')
@section('content')
Inspection 查核巡視
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            Inspection 查核巡視
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>Date</th>
		                    <th>Time</th>
		                    <th>ContractorProjectID</th>
		                    <th>InspectionWorkNumber</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>

		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $Inspections as $Inspection)
		                <tr>
		                    <td>{{ $Inspection->id }}</td>
		                    <td>{{ $Inspection->Date }}</td>
		                    <td>{{ $Inspection->Time }}</td>
		                    <td>{{ $Inspection->ContractorProjectID }}</td>
		                    <td>{{ $Inspection->InspectionWorkNumber }}</td>
		                    <td>{{ $Inspection->created_at }}</td>
		                    <td>{{ $Inspection->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/Inspection/edit/'.$Inspection->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/Inspection/delete/'.$Inspection->id) }}" class="btn btn-small btn-danger">
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
		            InspectionSpec 查核巡視
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/Inspection/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>Date</th><th><input type="Date" name="Date">-<input type="Time" name="Time"></th> 
		                </tr>
		                <tr>
		                	<th>ContractorProjectID</th>
		                	<th>
		                		<select name="ContractorProjectID">
		                			@foreach ( $ContractorProjects as $ContractorProject)
		                			<option value="{{$ContractorProject->id}}"> {{ $ContractorProject->id.'-'.$ContractorProject->name}}</option>
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