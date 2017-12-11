@extends('layout.app')
@section('content')


<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             電廠部門
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>部門</th>
		                    <th>課別</th>
		                    <th>創建時間</th>
		                    <th>更新時間</th>
		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $PowerPlantDeps as $PowerPlantDep)
		                <tr>
		                    <td>{{ $PowerPlantDep->Dep }}</td>
		                    <td>{{ $PowerPlantDep->Class }}</td>
		                    <td>{{ $PowerPlantDep->created_at }}</td>
		                    <td>{{ $PowerPlantDep->updated_at }}</td>
		                    <td class="td-actions">
		                    	<a href="{{URL::to('/manage/PowerPlantDep/edit/'.$PowerPlantDep->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/PowerPlantDep/delete/'.$PowerPlantDep->id) }}" class="btn btn-small btn-danger">
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
		            電廠部門
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/PowerPlantDep/insert') }}" method="post">
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