@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             承攬商-員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>公司名稱</th>
		                    <th>員工編號</th>
		                    <th>員工名稱</th>
		                    <th>創建時間</th>
		                    <th>更新時間</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ($ContractorStaffs as $ContractorStaff)
		                <tr>
		                    <td>{{ $ContractorStaff->Contractors->CompanyName }}</td>
		                    <td>{{ $ContractorStaff->PID }}</td>
		                    <td>{{ $ContractorStaff->Titile }}</td>
		                    <td>{{ $ContractorStaff->created_at }}</td>
		                    <td>{{ $ContractorStaff->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/ContractorStaff/edit/'.$ContractorStaff->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/ContractorStaff/delete/'.$ContractorStaff->id) }}" class="btn btn-small btn-danger">
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
		             承攬商-員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/ContractorStaff/insert') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<tr>
		            		<th>公司名稱</th>
		            		<th>
		            			<select name="Contractor">
		                			@foreach ( $Contractors as $Contractor)
		                			<option value="{{$Contractor->id}}"> {{ $Contractor->CompanyName.'-'.$Contractor->CompanyId }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text" name="PID"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text" name="Name"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text" name="Titile"></th></tr>
	                    <tr><th class="td-actions"></th></tr>
	                	<tr><td colspan="2"  valign="right" style="text-align: right;" >
	            				<input type="submit" name="">
	            			</td>
	            		</tr>
		            </thead>
		            </form>
		        </table>
		    </div>
		</div>
	</div>
</div>
@endsection