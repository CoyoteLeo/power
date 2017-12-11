@extends('layout.app')
@section('content')
PowerPlanDeps 電廠部門-更新
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            PowerPlanDeps 電廠部門-更新
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlanDep/update') }}" method="post">
		    		
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                	<input type="hidden" name="id" value="{{ $PowerPlanDeps->id }}">
		                    <th>部門名稱</th><th><input type="Text" name="Dep" value="{{ $PowerPlanDeps->Dep }}"></th> 
		                </tr>
		                <tr>
		                	<th>所屬課別</th><th><input type="Text" name="Class" value="{{ $PowerPlanDeps->Class }}"></th>
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