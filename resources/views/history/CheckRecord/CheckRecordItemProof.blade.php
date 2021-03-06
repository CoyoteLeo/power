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
<a href="{{URL::to('/history/CheckRecordItemAll')}}">
	<h3 style="color:green">
		查核紀錄項目：{{ $id }}
	</h3>
</a>
<div class="row" >
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5 style="color:red">
					改善前佐證資料
		        </h5>
		    </div>
			@if(count($CheckRecordItemProofs)>0)
				<div class="box-content box-table">
					<table id="sample-table" class="table table-hover table-bordered tablesorter">
						<thead>
							<tr>
								{{--<th>查核紀錄佐證單號</th>--}}
								<th>檔案名稱</th>
								<th>檔案類型</th>
								<th>創建時間</th>
								{{--<th class="td-actions"></th>--}}
							</tr>
						</thead>
						<tbody>
							@foreach ( $CheckRecordItemProofs as $CheckRecordItemProof)
							<tr>
{{--								<td>{{ $CheckRecordItemProof->CheckRecordWorkNumber }}</td>--}}
								<td>
									<a href="{{ asset("uploads/$CheckRecordItemProof->FileName.$CheckRecordItemProof->Type") }} ">
										{{ $CheckRecordItemProof->FileName }}
									</a>
								</td>
								<td>{{ $CheckRecordItemProof->Type }}</td>
								<td>{{ $CheckRecordItemProof->created_at }}</td>
								{{--<td class="td-actions">--}}
									{{--<!----}}
									{{--<a href="{{URL::to('/history/CheckRecordItemProof/edit/'.$CheckRecordItemProof->id) }}" class="btn btn-small btn-info">--}}
										{{--<i class="btn-icon-only icon-pencil"></i>--}}
									{{--</a>--}}
									{{---->--}}

									{{--<a href="{{URL::to('/history/CheckRecordItemProof/delete/'.$CheckRecordItemProof->id) }}" class="btn btn-small btn-danger">--}}
										{{--<i class="btn-icon-only icon-remove"></i>--}}
									{{--</a>--}}
								{{--</td>--}}
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h5 style="color:black;text-align: center;">
					暫無資料
				</h5>
			@endif
		</div>
	</div>
</div>
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
			<div class="box-header">
				<i class="icon-table"></i>
				<h5 style="color:blue">
					改善後佐證資料
				</h5>
			</div>
			@if(count($CheckRecordItemProofs_after)>0)
				<div class="box-content box-table">
					<table id="sample-table" class="table table-hover table-bordered tablesorter">
						<thead>
						<tr>
							{{--<th>查核紀錄佐證單號</th>--}}
							<th>檔案名稱</th>
							<th>檔案類型</th>
							<th>創建時間</th>
							{{--<th class="td-actions"></th>--}}
						</tr>
						</thead>
						<tbody>
						@foreach ( $CheckRecordItemProofs_after as $CheckRecordItemProof_after)
							<tr>
{{--								<td>{{ $CheckRecordItemProof_after->CheckRecordWorkNumber }}</td>--}}
								<td>
									<a href="{{ asset("upload/$CheckRecordItemProof_after->FileName.$CheckRecordItemProof_after->Type") }} ">
										{{ $CheckRecordItemProof_after->FileName }}
									</a>
								</td>
								<td>{{ $CheckRecordItemProof_after->Type }}</td>
								<td>{{ $CheckRecordItemProof_after->created_at }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			@else
				<h5 style="color:black;text-align: center;">
					暫無資料
				</h5>
			@endif
		</div>
	</div>
</div>
@if($CheckRecordItem->Deadline == null)
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
					<form action="{{ url('/history/CheckRecordItem/insert')}} " method="post" id="PowerDeadline">
						{{ csrf_field()}}
						<table id="sample-table" class="table table-hover table-bordered tablesorter">
							<input type="hidden" name="CheckWorkNumber" value="{{ $id }}">
							<input type="hidden" name="index" value="{{ $index }}">
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
@else
<div class="row">
	<div class="span16">
		<div class="box pattern pattern-sandstone">
		    <div class="box-header">
		        <i class="icon-table"></i>
		        <h5>
					上傳改善後佐證資料
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/history/CheckRecordItemProof/insert') }}" method="post"  enctype="multipart/form-data" id="PowerFile">
		    	{{ csrf_field() }}
		    		<input type="hidden" name="CheckRecordWorkNumber" value="{{ $id }}">
					<input type="hidden" name="index" value="{{ $index }}">
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		            <thead>
		                <tr>
		                	<th>檔案上傳</th>
		                	<th><input type="file" name="file" id="file" accept="image/*"></th>
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
@if($CheckRecordItem->FineNumber==null)
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
					<form action="{{ url('/history/CheckRecordItem/insert')}} " method="post" id="PowerFine">
						{{ csrf_field()}}
						<table id="sample-table" class="table table-hover table-bordered tablesorter">
							<input type="hidden" name="CheckWorkNumber" value="{{ $id }}">
							<input type="hidden" name="index" value="{{ $index }}">
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
@endif


<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#PowerFile").validate({
        rules: {
            file: {
                required: true,
            }
        }, messages: {
            file: {
                required: "請上傳改善後圖片",
            }
        }
    })
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