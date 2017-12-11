@extends('layout.app')
@section('content')

<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             電廠員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>員工編號</th>
		                    <th>帳號</th>
		                    <th>密碼</th>
		                    <th>部門</th>
		                    <th>名稱</th>
		                    <th>電子郵件</th>
		                    <th>創建時間</th>
		                    <th>更新時間</th>

		                    <th class="td-actions"></th>
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $PowerPlantStaffs as $PowerPlantStaff)
		                <tr>
		                    <td>{{ $PowerPlantStaff->PID }}</td>
		                    <td>{{ $PowerPlantStaff->Name }}</td>
		                    <td>{{ $PowerPlantStaff->password }}</td>
		                    <td>{{ $PowerPlantStaff->PowerPlantDep->Dep }}-{{ $PowerPlantStaff->PowerPlantDep->Class }}</td>
		                    <td>{{ $PowerPlantStaff->Titile }}</td>
		                    <td>{{ $PowerPlantStaff->Email }}</td>
		                    <td>{{ $PowerPlantStaff->created_at }}</td>
							<td>{{ $PowerPlantStaff->updated_at }}</td>
		                    <td class="td-actions">
								<a href="{{URL::to('/manage/PowerPlantStaff/edit/'.$PowerPlantStaff->id) }}" class="btn btn-small btn-info">
		                            <i class="btn-icon-only icon-pencil"></i>
		                        </a>
		                        <a href="{{URL::to('/manage/PowerPlantStaff/delete/'.$PowerPlantStaff->id) }}" class="btn btn-small btn-danger">
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
		             電廠員工
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<form action="{{ url('/manage/PowerPlantStaff/insert') }}" method="post">
		    		{{ csrf_field() }}
		            <thead>
		            	<tr>
		            		<th>電廠部門</th>
		            		<th>
		            			<select name="PowerPlantDepID">
		                			@foreach ( $PowerPlantDeps as $PowerPlantDep)
		                			<option value="{{$PowerPlantDep->id}}"> {{ $PowerPlantDep->Dep.'-'.$PowerPlantDep->Class }}</option>
		                			@endforeach
		                		</select>
		                	</th>
		                </tr>		
	                    <tr><th>員工編號</th><th>   <input type="Text" name="PID"></th></tr>
	                    <tr><th>名字(帳號)</th><th> <input type="Text" name="Name"></th></tr>
	                    <tr><th>密碼</th><th>       <input type="password" name="password"></th></tr>
	                    <tr><th>職稱</th><th>       <input type="Text" name="Titile"></th></tr>
	                    <tr><th>Email</th><th>      <input type="Text" name="Email"></th></tr>
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