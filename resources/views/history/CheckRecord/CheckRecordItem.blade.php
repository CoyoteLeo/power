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
            查核紀錄單號：{{$CheckRecordItems[0]->CheckWorkNumber }}
        </h3>
    </a>
<div class="row" style="font-family: Microsoft YaHei">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-table"></i>
                <h5> 查核紀錄項目</h5>
            </div>
            <div class="box-content box-table">
                <table id="sample-table" class="table table-hover table-bordered tablesorter">
                    <thead>
                        <tr>
                            <th>查核紀錄單號</th>
                            <th>員工姓名</th>
                            <th>地點</th>
                            <th>內容</th>
                            <th>改善日期</th>
                            <th>完成日期</th>
                            <th>罰款單號</th>
                            <th>更新時間</th>
                            <th>狀態</th>
                            {{--<th class="td-actions"></th>--}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $CheckRecordItems as $CheckRecordItem)
                        <tr></a>
                            <td><a href="{{URL::to('/history/CheckRecordItemProof/'.$CheckRecordItem->CheckWorkNumber.'/'.$CheckRecordItem->Index)}}">{{$CheckRecordItem->CheckWorkNumber }}{{sprintf("%02d", $CheckRecordItem->Index)}}</a></td>
                            <td>{{ $CheckRecordItem->PowerPlantStaff->Name }}</td>
                            <td>{{ $CheckRecordItem->Area }}</td>
                            <td>{{ $CheckRecordItem->Content }}</td>
                            <td>
                                @if($CheckRecordItem->Deadline == null)
                                    無
                                @else
                                    {{ $CheckRecordItem->Deadline }}
                                @endif
                            </td>
                            <td>
                                @if($CheckRecordItem->CompleteDate == null)
                                    無
                                @else
                                    {{ $CheckRecordItem->CompleteDate }}
                                @endif
                            </td>
                            <td>
                                @if($CheckRecordItem->FineNumber == null)
                                    無
                                @else
                                    {{ $CheckRecordItem->FineNumber }}
                                @endif
                            </td>
                            <td>{{ $CheckRecordItem->updated_at }}</td>
                            @if($CheckRecordItem->Deadline == null)
                                <td style="color:green;font-weight: bold;">待填寫</td>
                            @elseif($CheckRecordItem->CompleteDate == null)
                                <td  style="color:red;font-weight: bold;">待改善</td>
                            @else
                                <td  style="color:blue;font-weight: bold;">已完成</td>
                            @endif
                            {{--<td class="td-actions">--}}
                                {{--<a href="{{URL::to('/history/CheckRecordItem/edit/'.$CheckRecordItem->id) }}" class="btn btn-small btn-info">--}}
                                    {{--<i class="btn-icon-only icon-pencil"></i>--}}
                                {{--</a>--}}
                                {{--<a href="{{URL::to('/history/CheckRecordItem/delete/'.$CheckRecordItem->id) }}" class="btn btn-small btn-danger">--}}
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