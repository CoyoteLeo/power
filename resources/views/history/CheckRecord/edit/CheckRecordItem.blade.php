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
        查核紀錄修改：{{ $id }}
    </h3>
</a>
<div class="row">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-table"></i>
                <h5> 查核紀錄項目 修改</h5>
            </div>
            <div class="box-content box-table">
                <form action="{{ url('/history/CheckRecordItem/update')}} " method="post" id="Power">
                    {{ csrf_field()}}
                    <table id="sample-table" class="table table-hover table-bordered tablesorter">
                        <input type="hidden" name="CheckWorkNumber" value="{{ $CheckRecordItems->CheckWorkNumber }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <thead>
                            <tr>
                                <th>地點</th><th><input type="text"  name="Area" value="{{$CheckRecordItems->Area }}"></th> 
                            </tr>
                            <tr>
                                <th>內容</th><th><TEXTAREA cols='50' rows='5' name='Content' >{{$CheckRecordItems->Content }}</TEXTAREA></th> 
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
<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#Power").validate({
        rules: {
            Area: {
                required: true,
            },Content: {
                required: true,
            }
        }, messages: {
            Area: {
                required: "請輸入地點",
            },Content: {
                required: "請輸入內容",
            }
        }
    })
</script>
@endsection