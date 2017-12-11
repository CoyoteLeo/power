@extends('layout.app')
@section('content')
PowerPlanDeps 電廠部門

<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		            PowerPlanDeps 電廠部門
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>Dep</th>
		                    <th>Class</th>
		                    <th>created_at</th>
		                    <th>updated_at</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $PowerPlanDeps as $PowerPlanDep)
		                <tr>
		                    <td>{{ $PowerPlanDep->id }}</td>
		                    <td>{{ $PowerPlanDep->Dep }}</td>
		                    <td>{{ $PowerPlanDep->Class }}</td>
		                    <td>{{ $PowerPlanDep->created_at }}</td>
		                    <td>{{ $PowerPlanDep->updated_at }}</td>
		                    <td class="td-actions">
		                    	<a href="{{URL::to('/manage/PowerPlanDep/edit/'.$PowerPlanDep->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/PowerPlanDep/delete/'.$PowerPlanDep->id) }}" class="btn btn-small btn-danger">
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
		            PowerPlanDeps 電廠部門
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlanDep/insert') }}" method="post">
		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>部門名稱</th><th><input type="Text" name="Dep"></th> 
		                </tr>
		                <tr>
		                	<th>所屬課別</th><th><input type="Text" name="Class"></th>
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