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

    <div class="row" style="font-family: Microsoft YaHei">
        <div class="span16">
            <div class="box pattern pattern-sandstone">
                <div class="box-header">
                    <i class="icon-table"></i>
                    <h5>
                        查核紀錄
                    </h5>
                </div>
                <div class="box-content box-table">
                    <table id="sample-table" class="table table-hover table-bordered tablesorter">
                        <thead>
                        <tr>
                            <th>創建時間</th>
                            <th>查核人員</th>
                            <th>查核部門</th>
                            <th>查核地點</th>
                            <th>查核內容</th>
                            <th>預定完成日期</th>
                            <th>罰款單號</th>
                            <th>狀態</th>
                            <th>罰款編號</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ( $CheckRecordItemlist as $CheckRecordItem)
                            <tr>
                                <td><a href="{{URL::to('/history/CheckRecordItemProof/'.$CheckRecordItem->CheckWorkNumber.'/'.$CheckRecordItem->Index)}}">{{$CheckRecordItem->created_at}}</a></td>
                                <td>
                                @for ( $i = 0 ; $i< count($CheckRecordItem->PowerPlantStaffId) ; $i++)
                                        @if($i > 0)
                                            、
                                        @endif
                                        {{$CheckRecordItem->PowerPlantStaffId[$i]}}
                                @endfor
                                </td>
                                <td>{{$CheckRecordItem->Dep}}</td>
                                <td>{{$CheckRecordItem->Area}}</td>
                                <td>{{$CheckRecordItem->Content}}</td>
                                <td>
                                    @if($CheckRecordItem->Deadline == null)
                                        無
                                    @else
                                        {{ $CheckRecordItem->Deadline }}
                                    @endif
                                </td>
                                <td>
                                    @if($CheckRecordItem->FineNumber == null)
                                        無
                                    @else
                                        {{ $CheckRecordItem->FineNumber }}
                                    @endif
                                </td>
                                @if($CheckRecordItem->Deadline == null)
                                    <td style="color:green;font-weight: bold;">待填寫</td>
                                @elseif($CheckRecordItem->CompleteDate == null)
                                    <td  style="color:red;font-weight: bold;">待改善</td>
                                @else
                                    <td  style="color:blue;font-weight: bold;">已完成</td>
                                @endif

                                <td class="td-actions">
                                    <a href="{{URL::to('/history/CheckRecordItem/print/'.$CheckRecordItem->CheckWorkNumber.'/'.$CheckRecordItem->Index) }}" class="btn btn-small btn-info">
                                        <i class="btn-icon-only icon-print"></i>
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

@endsection