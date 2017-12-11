@extends('layout.app')
@section('content')
Contractor 承攬商 更新
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            Contractor 承攬商 更新
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/Contractor/update') }}" method="post">
		    		{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<input type="hidden" name="id" value="{{ $Contractors->id }}">
		                <tr>
		                    <th>公司名稱</th><th><input type="Text" name="CompanyName" value="{{ $Contractors->CompanyName }}"></th> 
		                </tr>
		                <tr>
		                	<th>公司編號</th><th><input type="Text" name="CompanyId"   value="{{ $Contractors->CompanyId }}"></th>
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