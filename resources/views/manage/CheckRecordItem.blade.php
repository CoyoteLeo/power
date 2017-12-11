@extends('layout.app')
@section('content')
CheckRecordItem 查核紀錄項目
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            CheckRecordItem 查核紀錄項目
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>CheckWorkNumber</th>
		                    <th>Index</th>
		                    <th>PowerPlantStaffId</th>
		                    <th>Area</th>
		                    <th>Content</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $CheckRecordItems as $CheckRecordItem)
		                <tr>
		                    <td>{{ $CheckRecordItem->id }}</td>
		                    <td>{{ $CheckRecordItem->CheckWorkNumber }}</td>
		                    <td>{{ $CheckRecordItem->Index }}</td>
		                    <td>{{ $CheckRecordItem->PowerPlantStaff->Titile }}</td>
		                    <td>{{ $CheckRecordItem->Area }}</td>
		                    <td>{{ $CheckRecordItem->Content }}</td>
		                    <td>{{ $CheckRecordItem->created_at }}</td>
		                    <td>{{ $CheckRecordItem->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/CheckRecordItem/edit/'.$CheckRecordItem->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/CheckRecordItem/delete/'.$CheckRecordItem->id) }}" class="btn btn-small btn-danger">
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
		            CheckRecordItem 查核紀錄項目
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/CheckRecordItem/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                	<th>員工編號</th>
		                	<th>
		                		<select name="PowerPlantStaffId">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                			<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->id.'-'.$PowerPlantStaff->Titile }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
		                <tr>
		                    <th>地點</th>
		                    <th><input type="text"  name="Area"></th> 
		                </tr>
		                <tr>
		                    <th>內容</th>
		                    <th><TEXTAREA cols='50' rows='5' name='Content' ></TEXTAREA></th> 
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