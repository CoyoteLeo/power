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
		    	<form action="{{ url('/manage/Inspection/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<input type="hidden" name="id" value="{{ $Inspections->id }}">
		            <thead>
		                <tr>
		                    <th>Date</th>
		                    <th>
		                    	<input type="Date" name="Date" value="{{ $Inspections->Date }}">-
		                    	<input type="Time" name="Time" value="{{date('H:i:s',strtotime($Inspections->Time)) }}"></th> 
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