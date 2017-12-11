@extends('layout.app')
@section('content')
<div class="row"  style="font-family: Microsoft YaHei">
    <div class="span16">
        <div class="box pattern pattern-sandstone">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>最新消息</h5>
            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ( $News as $new)
                        <li>
                            <font color="black" >
                                <b>
                                標題：{{$new->Titile}}&nbsp&nbsp
                                </b>
                            </font>
                            <font color="blue" >
                                日期：{{ date('Y-m-d H:i:s',strtotime($new->Date))}}&nbsp&nbsp
                                <br>
                                發佈人：{{$new->PowerPlantStaff->Name }}&nbsp&nbsp
                                部門：{{$new->PowerPlantDep->Dep }}-{{$new->PowerPlantDep->Class }}
                            </font>
                            <!--  <font color="blue">未處理</font>  -->
                            <p class="news-item-preview">{{$new->Content}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</dir>
</div>
@endsection