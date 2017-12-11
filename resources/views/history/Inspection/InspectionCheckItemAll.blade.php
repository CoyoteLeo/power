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
					工安巡檢
				</h5>
			</div>
			<div class="box-content box-table">
				<table id="sample-table" class="table table-hover table-bordered tablesorter">
					<thead>
					<tr>
						<th>專案名稱</th>
						<th>承攬商</th>
						<th>負責部門</th>
						<th>查核人員</th>
						<th>巡視項目</th>
						<th>查核內容</th>
						<th>預定完成日期</th>
						<th>類型</th>
						<th>違規項目</th>
						<th>罰款編號</th>
						<th>狀態</th>
						<th>操作</th>
						{{--<th>狀態</th>--}}
						{{--<th class="td-actions"></th>--}}
					</tr>
					</thead>
					<tbody>
					@foreach ( $InspectionCheckItems as $Inspection)
						<tr>
							<td><a href="{{URL::to('/history/InspectionCheckItemProof/'.$Inspection->id) }}" >{{ $Inspection->contractor_projects }}</a></td>
							<td>{{ $Inspection->CompanyName}}</td>
							<td>{{ $Inspection->Dep}}</td>
							<td>{{ $Inspection->StaffName}}</td>
							<td>{{ $Inspection->CategoriesName}}</td>
							<td>
								@if($Inspection->Remark == null)
									無
								@else
									{{ $Inspection->Remark }}
								@endif
							</td>
							<td>
								@if($Inspection->Deadline == null)
									無
								@else
									{{ $Inspection->Deadline }}
								@endif
							</td>
							<td style="font-weight: bold">
								@if($Inspection -> Conform == 1)
									符合
								@else
									不符合
								@endif
							</td>
							<td>
								@if($Inspection->Content == null)
									無
								@else
									{{ $Inspection->Content }}
								@endif
							</td>
							<td>
								@if($Inspection->FineNumber == null)
									無
								@else
									{{ $Inspection->FineNumber }}
								@endif
							</td>
							@if($Inspection -> Deadline != null)
								<td  style="color:red;font-weight: bold;">待改善</td>
							@else
								<td  style="color:green;font-weight: bold;">待填寫</td>
							@endif
							<td class="td-actions">
								<a href="{{URL::to('/history/InspectionCheckItem/print/'.$Inspection->id) }}" class="btn btn-small btn-info">
									<i class="btn-icon-only icon-print"></i>
								</a>
							</td>
							{{--@if($Inspection->Deadline == null)--}}
								{{--<td style="color:green;font-weight: bold;">待填寫</td>--}}
							{{--@elseif($Inspection->CompleteDate == null)--}}
								{{--<td  style="color:red;font-weight: bold;">待改善</td>--}}
							{{--@else--}}
								{{--<td  style="color:blue;font-weight: bold;">已完成</td>--}}
							{{--@endif--}}
							
							{{--<td class="td-actions">--}}
							{{--<a href="{{URL::to('/history/CheckRecord/delete/'.$CheckRecord->id) }}" class="btn btn-small btn-danger">--}}
							{{--<i class="btn-icon-only icon-remove"></i>--}}
							{{--</a>--}}
							{{--</td>--}}
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection