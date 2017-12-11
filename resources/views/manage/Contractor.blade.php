@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             承攬商
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>公司名稱</th>
		                    <th>統一編號</th>
		                    <th>創建時間</th>
		                    <th>更新時間</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ($Contractors as $Contractor)
		                <tr>
		                    <td>{{ $Contractor->CompanyName }}</td>
		                    <td>{{ $Contractor->CompanyId }}</td>
							<td>{{ $Contractor->created_at }}</td>
		                    <td>{{ $Contractor->updated_at }}</td>
		                    <td class="td-actions">
		                        <a href="{{URL::to('/manage/Contractor/edit/'.$Contractor->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        	
		                        <a href="{{URL::to('/manage/Contractor/delete/'.$Contractor->id) }}" class="btn btn-small btn-danger">
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
		             承攬商 輸入
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/Contractor/insert') }}" method="post">
		    		{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>公司名稱</th><th><input type="Text" name="CompanyName"></th> 
		                </tr>
		                <tr>
		                	<th>公司編號</th><th><input type="Text" name="CompanyId"></th>
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