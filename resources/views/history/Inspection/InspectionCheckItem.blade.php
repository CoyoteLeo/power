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
{{--<div class="row">--}}
	{{--<div class="span16">--}}
		{{--<div class="box pattern pattern-sandstone">--}}
		    {{--<div class="box-header">--}}
		        {{--<i class="icon-table"></i>--}}
		        {{--<h5>--}}
		            {{--查核巡視項目--}}
		        {{--</h5>--}}
		    {{--</div>--}}
		    {{--<div class="box-content box-table">--}}
		    	{{--<form action="{{ url('/history/InspectionCheckItem/insert') }}" method="post">--}}
		    	{{--{{ csrf_field() }}--}}
		    	{{--<input type="hidden" name="id" value="{{$id}}">--}}
		        {{--<table id="sample-table" class="table table-hover table-bordered tablesorter">--}}
		            {{--<thead>--}}
		                {{--<tr>--}}
		                    {{--<th>查核項目</th>--}}
		                    {{--<th>--}}
		                    	{{--<select name="InspectionItemSpecID">--}}
		                			{{--@foreach ( $OperationSpecItems as $OperationSpecItem)--}}
		                			{{--<option value="{{$OperationSpecItem->ID}}"> --}}
		                				{{--{{ $OperationSpecItem->OperationSpecCategory->Name}}-{{$OperationSpecItem->Name }}--}}
		                			{{--</option>--}}
		                			{{--@endforeach--}}
		                		{{--</select>--}}
		                    {{--</th> --}}
		                {{--</tr>--}}
		                {{--<tr>--}}
		                	{{--<th>符合？</th>--}}
		                	{{--<th>--}}
								{{--<select name="Type">--}}
		                			{{--<option value="符合" select>符合</option>--}}
									{{--<option value="不符合">不符合</option>--}}
		                		{{--</select>--}}
		                	{{--</th>--}}
		                {{--</tr>--}}
		                {{--<tr>--}}
		                	{{--<th>安全衛生條款</th>--}}
		                	{{--<th>--}}
		                		{{--<select name="TermsID">--}}
		                			{{--@foreach ( $Terms as $Term)--}}
		                			{{--<option value="{{$Term->id}}"> {{ $Term->ItemB.'-'.$Term->ItemL }}</option>--}}
		                			{{--@endforeach--}}
		                		{{--</select>--}}
		                	{{--</th>--}}
		                {{--</tr>--}}
		                {{--<tr>--}}
		                	{{--<th>註解</th>--}}
		                	{{--<th>--}}
		                		{{--<TEXTAREA cols='50' rows='5' name='Remark'></TEXTAREA>--}}
		                	{{--</th>--}}
		                {{--</tr>--}}
		                {{--<tr> --}}
		            		{{--<td colspan="2"  valign="right" style="text-align: right;" >--}}
		            			{{--<input type="submit" name="">--}}
		            		{{--</td>--}}
		            	{{--</tr>--}}
		            {{--</thead>--}}
		        {{--</table>--}}
		        {{--</form>--}}
		    {{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}
<a href="{{URL::to('/history/InspectionCheckItemAll')}}">
	<h3 style="color:green">
		@if(count($InspectionCheckItems)>0)
			查核巡視單號：{{$InspectionCheckItems[0]->InspectionWorkNumber }}
			@elseif(count($InspectionCheckItemss)>0)
			查核巡視單號：{{$InspectionCheckItemss[0]->InspectionWorkNumber }}
			@endif
	</h3>
</a>
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
		             查核巡視項目
		        </h5>
		    </div>
		    <div class="box-content box-table">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                    <th>巡視單號</th>
		                    <th>巡視項目</th>
		                    <th>類型</th>
		                    <th>法條款項</th>
		                    <th>註解</th>
		                    <th>狀態</th>
		                    {{--<th class="td-actions"></th>--}}
		                </tr>
		            </thead>
		            <tbody>
		            	@foreach ( $InspectionCheckItems as $InspectionCheckItem)
		                <tr>

		                    <td>
		                    	<a href="{{URL::to('/history/InspectionCheckItemProof/'.$InspectionCheckItem->id)}}">
		                    		{{ $InspectionCheckItem->InspectionWorkNumber }}
		                    	</a>
		                    </td>
		                    <td>{{ $InspectionCheckItem->CategoriesName }}-{{ $InspectionCheckItem->Name }}</td>

		                    <td style="font-weight: bold">
								@if($InspectionCheckItem -> Conform == 1)
									符合
								@else
									不符合
								@endif
							</td>
		                    <td>無</td>
		                    <td>
								@if($InspectionCheckItem -> Remark == null)
									無
								@else
									{{ $InspectionCheckItem->Remark }}
								@endif
							</td>

							@if($InspectionCheckItem -> Status == 1)
								<td  style="color:blue;font-weight: bold;">已完成</td>
							@else
								<td  style="color:red;font-weight: bold;">待改善</td>
							@endif
		                    {{--<td class="td-actions">--}}
		                    	{{--<!----}}
		                    	{{--<a href="{{URL::to('/manage/InspectionCheckItem/edit/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-info">--}}
		                            {{--<i class="btn-icon-only icon-pencil"></i>--}}
		                        {{--</a>--}}
								{{---->--}}
		                        {{--<a href="{{URL::to('/history/InspectionCheckItem/delete/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-danger">--}}
		                            {{--<i class="btn-icon-only icon-remove"></i>--}}
		                        {{--</a>--}}
		                    {{--</td>--}}
		                </tr>
		                @endforeach
						@foreach ( $InspectionCheckItemss as $InspectionCheckItem)
							<tr>

								<td>
									<a href="{{URL::to('/history/InspectionCheckItemProof/'.$InspectionCheckItem->id)}}">
										{{ $InspectionCheckItem->InspectionWorkNumber }}
									</a>
								</td>
								<td>{{ $InspectionCheckItem->CategoriesName }}-{{ $InspectionCheckItem->Name }}</td>

								<td style="font-weight: bold">
									@if($InspectionCheckItem -> Conform == 1)
										符合
									@else
										不符合
									@endif
								</td>
								<td>{{ $InspectionCheckItem->ItemB }}-第{{ $InspectionCheckItem->Terms->ItemL }}條</td>
								<td>
									@if($InspectionCheckItem -> Remark == null)
										無
									@else
										{{ $InspectionCheckItem->Remark }}
									@endif
								</td>

								@if($InspectionCheckItem -> Status == 1)
									<td  style="color:blue;font-weight: bold;">已完成</td>
								@else
									<td  style="color:red;font-weight: bold;">待改善</td>
								@endif
								{{--<td class="td-actions">--}}
								{{--<!----}}
								{{--<a href="{{URL::to('/manage/InspectionCheckItem/edit/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-info">--}}
								{{--<i class="btn-icon-only icon-pencil"></i>--}}
								{{--</a>--}}
								{{---->--}}
								{{--<a href="{{URL::to('/history/InspectionCheckItem/delete/'.$InspectionCheckItem->id) }}" class="btn btn-small btn-danger">--}}
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
@if($Inspections->Deadline == null)
	<div class="row">
		<div class="span16">
			<div class="box pattern pattern-sandstone">
				<div class="box-header">
					<i class="icon-table"></i>
					<h5>
						上傳預定改善日期
					</h5>
				</div>
				<div class="box-content box-table">
					<form action="{{ url('/history/InspectionCheckItem/insert')}} " method="post" id="PowerDeadline">
						{{ csrf_field()}}
						<table id="sample-table" class="table table-hover table-bordered tablesorter">
							<input type="hidden" name="id" value="{{ $id }}">
							<input type="hidden" name="Type" value="Deadline">
							<thead>
							<tr>
								<th>預計完成日期</th><th><input type="Date" name="Deadline"></th>
							</tr>
							<tr>
								<td colspan="2"  valign="right" style="text-align: right;" ><input type="submit" name=""></td>
							</tr>
							</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
@elseif($Inspections->FineNumber==null)
	<div class="row">
		<div class="span16">
			<div class="box pattern pattern-sandstone">
				<div class="box-header">
					<i class="icon-table"></i>
					<h5>
						上傳罰款單號
					</h5>
				</div>
				<div class="box-content box-table">
					<form action="{{ url('/history/InspectionCheckItem/insert')}} " method="post" id="PowerFine">
						{{ csrf_field()}}
						<table id="sample-table" class="table table-hover table-bordered tablesorter">
							<input type="hidden" name="id" value="{{ $id }}">
							<input type="hidden" name="Type" value="Fine">
							<thead>
							<tr>
								<th>罰款單號</th><th><input type="text" name="FineNumber"></th>
							</tr>
							<tr>
								<td colspan="2"  valign="right" style="text-align: right;" ><input type="submit" name=""></td>
							</tr>
							</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

@endif

<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#PowerDeadline").validate({
        rules: {
            Deadline: {
                required: true,
            }
        }, messages: {
            Deadline: {
                required: "請輸入預計完成日期",
            }
        }
    })
    $("#PowerFine").validate({
        rules: {
            FineNumber: {
                required: true,
            }
        }, messages: {
            FineNumber: {
                required: "請輸入罰款單號",
            }
        }
    })
</script>
@endsection