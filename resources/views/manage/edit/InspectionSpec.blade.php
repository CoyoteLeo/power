@extends('layout.app')
@section('content')
InspectionSpec 查核巡視項目規格
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            InspectionSpec 查核巡視項目規格
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/InspectionSpec/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<input type="hidden" name="id" value="{{$InspectionSpecs->id}}">
		            <thead>
		                <tr>
		                    <th>年分</th><th><input type="Text" name="Year"  value="{{$InspectionSpecs->Year}}"></th> 
		                </tr>
		                <tr>
		                    <th>大項</th><th><input type="Text" name="ItemB" value="{{$InspectionSpecs->ItemB}}"></th> 
		                </tr>
		                <tr>
		                    <th>小項</th><th><input type="Text" name="ItemL" value="{{$InspectionSpecs->ItemL}}"></th> 
		                </tr>
		                <tr>
		                    <th>項目</th><th><input type="Text" name="Item"  value="{{$InspectionSpecs->Item}}"></th> 
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