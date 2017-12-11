@extends('layout.app')
@section('content')
InspectionCheckItem 查核巡視項目
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            InspectionCheckItems 查核巡視項目
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>InspectionWorkNumber</th>
		                    <th>InspectionItemSpecID</th>
		                    <th>Type</th>
		                    <th>TermsID</th>
		                    <th>Remark</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $InspectionCheckItems as $InspectionCheckItem)
		                <tr>
		                    <td>{{ $InspectionCheckItem->id }}</td>
		                    <td>{{ $InspectionCheckItem->InspectionWorkNumber }}</td>
		                    <td>{{ $InspectionCheckItem->InspectionItemSpecID }}</td>
		                    <td>{{ $InspectionCheckItem->Type }}</td>
		                    <td>{{ $InspectionCheckItem->TermsID }}</td>
		                    <td>{{ $InspectionCheckItem->Remark }}</td>
		                    <td>{{ $InspectionCheckItem->created_at }}</td>
		                    <td>{{ $InspectionCheckItem->updated_at }}</td>
		                    <td class="td-actions">
		                    	<!--
		                    	<a href="{{URL::to('/manage/InspectionCheckItem/edit/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
								-->
		                        <a href="{{URL::to('/manage/InspectionCheckItem/delete/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-danger">
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
		            InspectionCheckItems 查核巡視項目
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/InspectionCheckItem/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<tr>
		                    <th>PowerPlantStaffs</th>
		                    <th>
		                    	<select name="PowerPlantStaffID">
		                			@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                			<option value="{{$PowerPlantStaff->id}}"> 
		                				{{ $PowerPlantStaff->Titile }}
		                			</option>
		                			@endforeach
		                		</select>
		                    </th> 
		                </tr>
		                <tr>
		                    <th>InspectionItemSpecID</th>
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
		                	<th>優缺點</th>
		                	<th>
		                		<input type="Text" name="Type">
		                	</th>
		                </tr>
		                <tr>
		                	<th>TermsID</th>
		                	<th>
		                		<select name="TermsID">
		                			@foreach ( $Terms as $Term)
		                			<option value="{{$Term->id}}"> {{ $Term->ItemB.'-'.$Term->ItemL }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>
		                <tr>
		                	<th>Remark</th>
		                	<th>
		                		<TEXTAREA cols='50' rows='5' name='Remark'></TEXTAREA>
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