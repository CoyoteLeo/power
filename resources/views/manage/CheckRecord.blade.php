@extends('layout.app')
@section('content')
CheckRecord
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            CheckRecord 查核紀錄
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>Date</th>
		                    <th>Time</th>
		                    <th>CheckRecordWorkNumber</th>
		                    <th>PowerPlantStaffID</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $CheckRecords as $CheckRecord)
		                <tr>
		                    <td>{{ $CheckRecord->id }}</td>
		                    <td>{{ $CheckRecord->Date }}</td>
		                    <td>{{ $CheckRecord->Time }}</td>
		                    <td>{{ $CheckRecord->CheckRecordWorkNumber }}</td>
		                    <td>{{ $CheckRecord->PowerPlantStaff->Titile }}</td>
		                    <td>{{ $CheckRecord->created_at }}</td>
		                    <td>{{ $CheckRecord->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/CheckRecord/edit/'.$CheckRecord->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/CheckRecord/delete/'.$CheckRecord->id) }}" class="btn btn-small btn-danger">
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
		            CheckRecord 查核紀錄
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/CheckRecord/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>日期</th>
		                    <th><input type="Date" name="Date">-<input type="Time" name="Time"></th> 
		                </tr>
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