@extends('layout.app')
@section('content')
CheckRecordStaff
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            CheckRecordStaff 查核紀錄員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>CheckRecordWorkNumber</th>
		                    <th>PowerPlantStaffId</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $CheckRecordStaffs as $CheckRecordStaff)
		                <tr>
		                    <td>{{ $CheckRecordStaff->id }}</td>
		                    <td>{{ $CheckRecordStaff->CheckRecordWorkNumber }}</td>
		                    <td>{{ $CheckRecordStaff->PowerPlantStaffId }}</td>
		                    <td>{{ $CheckRecordStaff->created_at }}</td>
		                    <td>{{ $CheckRecordStaff->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/CheckRecordStaff/edit/'.$CheckRecordStaff->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/CheckRecordStaff/delete/'.$CheckRecordStaff->id) }}" class="btn btn-small btn-danger">
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
		            CheckRecordStaff 查核紀錄員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/CheckRecordStaff/insert') }}" method="post"  >
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<tr>
		            	<th>員工編號</th>
			                <th>

		                		<select name="PowerPlantStaffID">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                			<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->id.'-'.$PowerPlantStaff->Titile }}</option>
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