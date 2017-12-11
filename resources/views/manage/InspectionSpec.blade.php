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
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>Year</th>
		                    <th>ItemB</th>
		                    <th>ItemL</th>
		                    <th>Item</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>

		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $InspectionSpecs as $InspectionSpec)
		                <tr>
		                    <td>{{ $InspectionSpec->id }}</td>
		                    <td>{{ $InspectionSpec->Year }}</td>
		                    <td>{{ $InspectionSpec->ItemB }}</td>
		                    <td>{{ $InspectionSpec->ItemL }}</td>
		                    <td>{{ $InspectionSpec->Item }}</td>
		                    <td>{{ $InspectionSpec->created_at }}</td>
		                    <td>{{ $InspectionSpec->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/InspectionSpec/edit/'.$InspectionSpec->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/InspectionSpec/delete/'.$InspectionSpec->id) }}" class="btn btn-small btn-danger">
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
		            InspectionSpec 查核巡視項目規格
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/InspectionSpec/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>年分</th><th><input type="Text" name="Year"></th> 
		                </tr>
		                <tr>
		                    <th>大項</th><th><input type="Text" name="ItemB"></th> 
		                </tr>
		                <tr>
		                    <th>小項</th><th><input type="Text" name="ItemL"></th> 
		                </tr>
		                <tr>
		                    <th>項目</th><th><input type="Text" name="Item"></th> 
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