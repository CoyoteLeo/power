@extends('layout.app')
@section('content')
CheckRecordItemProof
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            CheckRecordItemProof 查核紀錄佐證資料
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>CheckRecordWorkNumber</th>
		                    <th>CheckRecordIndex</th>
		                    <th>Index</th>
		                    <th>FileName</th>
		                    <th>Path</th>
		                    <th>Type</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    
		                    
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $CheckRecordItemProofs as $CheckRecordItemProof)
		                <tr>
		                    <td>{{ $CheckRecordItemProof->id }}</td>
		                    <td>{{ $CheckRecordItemProof->CheckRecordWorkNumber }}</td>
		                    <td>{{ $CheckRecordItemProof->CheckRecordIndex }}</td>
		                    <td>{{ $CheckRecordItemProof->Index }}</td>
		                    <td>{{ $CheckRecordItemProof->FileName }}</td>
		                    <td>{{ $CheckRecordItemProof->Path }}</td>
		                    <td>{{ $CheckRecordItemProof->Type }}</td>
		                    <td>{{ $CheckRecordItemProof->created_at }}</td>
		                    <td>{{ $CheckRecordItemProof->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/CheckRecordItemProof/edit/'.$CheckRecordItemProof->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/CheckRecordItemProof/delete/'.$CheckRecordItemProof->id) }}" class="btn btn-small btn-danger">
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
		            CheckRecordItemProof 查核紀錄佐證資料
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/CheckRecordItemProof/insert') }}" method="post"  enctype="multipart/form-data">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<tr>
		            	<th>員工編號</th>
			                <th>

		                		<select name="PowerPlantDepId">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                			<option value="{{$PowerPlantStaff->id}}"> {{ $PowerPlantStaff->id.'-'.$PowerPlantStaff->Titile }}</option>
		                			@endforeach
		                		</select>
			                </th>
		                </tr>
		                <tr>
		                	<th>檔案上傳</th>
		                	<th><input type="file" name="file" id="file"></th>
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