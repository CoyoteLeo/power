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
		    	<form action="{{ url('/manage/Inspection/update') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		            	<input type="hidden" name="id" value="{{$CheckRecordItemProof->id}}">
		                <tr>
		                	<th>檔案名稱</th>
		                	<th><input type="text"  name="FileName" value="{{$CheckRecordItemProof->FileName}}"></th>
		                </tr>
		                <tr>
		                    <th>路徑</th>
		                    <th><input type="text"  name="Path" value="{{$CheckRecordItemProof->Path}}"></th> 
		                </tr>
		                <tr>
		                    <th>類型</th>
		                    <th><input type="text"  name="Type" value="{{$CheckRecordItemProof->Type}}"></th> 
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