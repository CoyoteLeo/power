@extends('layout.app')
@section('content')
InspectionCheckItemProof
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            InspectionCheckItemProof 查核紀錄佐證資料
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>id</th>
		                    <th>InspectionWorkNumber</th>
		                    <th>InspectionItemSpecID</th>
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
		            	@foreach ( $InspectionCheckItemProofs as $InspectionCheckItemProof)
		                <tr>
		                    <td>{{ $InspectionCheckItemProof->id }}</td>
		                    <td>{{ $InspectionCheckItemProof->InspectionWorkNumber }}</td>
		                    <td>{{ $InspectionCheckItemProof->InspectionItemSpecID }}</td>
		                    <td>{{ $InspectionCheckItemProof->FileName }}</td>
		                    <td>{{ $InspectionCheckItemProof->Path }}</td>
		                    <td>{{ $InspectionCheckItemProof->Type }}</td>
		                    <td>{{ $InspectionCheckItemProof->created_at }}</td>
		                    <td>{{ $InspectionCheckItemProof->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/InspectionCheckItemProof/edit/'.$InspectionCheckItemProof->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/InspectionCheckItemProof/delete/'.$InspectionCheckItemProof->id) }}" class="btn btn-small btn-danger">
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
		            InspectionCheckItemProof 查核紀錄佐證資料
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/InspectionCheckItemProof/insert') }}" method="post"  enctype="multipart/form-data">
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
		                	<th>編號</th>
		                    <th>
		                    	<select name="InspectionItemSpecID">
		                			@foreach ( $InspectionSpecs as $InspectionSpec)
		                			<option value="{{$InspectionSpec->id}}"> 
		                				{{ $InspectionSpec->ItemB.'-'.$InspectionSpec->ItemL.'-'.$InspectionSpec->Item }}
		                			</option>
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