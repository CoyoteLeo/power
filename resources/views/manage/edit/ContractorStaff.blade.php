@extends('layout.app')
@section('content')
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            ContractorStaff 承攬商-員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/ContractorStaff/update') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<input type="hidden" name="id" value="{{$ContractorStaffs->id}}">
		            	<tr>
		            		<th>ContractorID</th>
		            		<th>
		            			<select name="Contractor">
		            				<option value="{{$ContractorStaffs->ContractorID}}"> 
		            					{{$ContractorStaffs->Contractors->CompanyName}}-
		            					{{$ContractorStaffs->Contractors->CompanyId}}
		            				</option>
		                			@foreach ( $Contractors as $Contractor)
		                			<option value="{{$Contractor->id}}"> {{ $Contractor->CompanyName.'-'.$Contractor->CompanyId }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text" name="PID"    value="{{$ContractorStaffs->PID}}"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text" name="Name"   value="{{$ContractorStaffs->Name}}"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text" name="Titile" value="{{$ContractorStaffs->Titile}}" ></th></tr>
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