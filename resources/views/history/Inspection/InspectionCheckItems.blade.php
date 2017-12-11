@extends('layout.app')
@section('content')

<style>
        label.error{
        font-size: 13px;
        color:red;
        
        }
        input.error{
        color:#a40000;
        border: solid 1px red;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, .7);
        }
    </style>
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
		                    <th>InspectionItemSpecID</th>
		                    <th>
		                    	<select name="InspectionItemSpecID">
		                			@foreach ( $OperationSpecItems as $OperationSpecItem)
		                			<option value="{{$OperationSpecItem->ID}}"> 
		                				{{ $OperationSpecItem->OperationSpecCategory->Name}}-{{$OperationSpecItem->Name }}
		                			</option>
		                			@endforeach
		                		</select>
		                    </th> 
		                </tr>
		                <tr>
		                	<th>符合？</th>
		                	<th>
								<select name="Type">
		                			<option value="符合" select>符合</option>
									<option value="不符合">不符合</option>
		                		</select>
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
		                    <th>查核巡視單號</th>
		                    <th>查核巡視項目</th>
		                    <th>類型</th>
		                    <th>法條款項</th>
		                    <th>註解</th>
		                    <th>創建時間</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $InspectionCheckItems as $InspectionCheckItem)
		                <tr>

		                    <td>
		                    	<a href="{{URL::to('/history/InspectionCheckItemProof/'.$InspectionCheckItem->InspectionWorkNumber)}}">
		                    		{{ $InspectionCheckItem->InspectionWorkNumber }}
		                    	</a>
		                    </td>
		                    <td>{{ $InspectionCheckItem->InspectionSpec->OperationSpecCategory->Name }}-{{ $InspectionCheckItem->InspectionSpec->$OperationSpecItem->Name }}</td>
		                    <td>{{ $InspectionCheckItem->Type }}</td>
		                    <td>{{ $InspectionCheckItem->Terms->ItemB }}-{{ $InspectionCheckItem->Terms->ItemL }}</td>
		                    <td>{{ $InspectionCheckItem->Remark }}</td>
		                    <td>{{ $InspectionCheckItem->created_at }}</td>
		                    <td class="td-actions">
		                    	<!--
		                    	<a href="{{URL::to('/manage/InspectionCheckItem/edit/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
								-->
		                        <a href="{{URL::to('/history/InspectionCheckItem/delete/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-danger">
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
@endsection