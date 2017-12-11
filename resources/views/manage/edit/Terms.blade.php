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
		            Terms 安全衛生條例
		        </h5>
		    </div>
		    <div class="box-content box-table">
		    	<form action="{{ url('/manage/Terms/update') }}" method="post" id="Power">

		    	{{ csrf_field() }}
		        <table id="sample-table" class="table table-hover table-bordered tablesorter">
		        	<input type="hidden" name="id" value="{{ $Terms->id }}">
		            <thead>
		                <tr>
		                    <th>年分</th><th><input type="Text" name="Year" value="{{ $Terms->Year }}"></th> 
		                </tr>
		                <tr>
		                	<th>大項</th><th><input type="Text" name="ItemB" value="{{ $Terms->ItemB }}"></th>
		                </tr>
		                <tr>
		                	<th>小項</th><th><input type="Text" name="ItemL" value="{{ $Terms->ItemL }}"></th>
		                </tr>
		                <tr>
		                	<th>項目</th><th><input type="Text" name="Item" value="{{ $Terms->Item }}"></th>
		                </tr>
		                <tr>
		                	<th>內容</th>
		                	<th>
		                		<TEXTAREA  rows="5" cols="60"  name="Content" >{{ $Terms->Content }}</TEXTAREA>
		                	</th>
		                </tr>
		                <tr>
		                	<th>罰金</th><th><input type="Text" name="Fine" value="{{ $Terms->Fine }}"></th>
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
<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#Power").validate({
        rules: {
            Year: {
                required: true,
            },ItemB: {
                required: true,
            },ItemL: {
                required: true,
            },Item: {
                required: true,
            },Content: {
                required: true,
            },Fine: {
                required: true,
            }
        }, messages: {
            Year: {
                required: "請輸入年分",
            },ItemB: {
                required: "請輸入大項",
            },ItemL: {
                required: "請輸入小項",
            },Item: {
                required: "請輸入項目",
            },Content: {
                required: "請輸入內容",
            },Fine: {
                required: "請輸入罰金",
            }
        }
    })
</script>
@endsection