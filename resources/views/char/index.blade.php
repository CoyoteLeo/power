@extends('layout.app')
@section('content')
<div class="row">
    <div class="span16">
        <div class="box">
            <div class="box-header">
                <i class="icon-bookmark"></i>
                <h5>統計報表</h5>
            </div>
            <div class="box-content">
                <div class="btn-group-box">
                    <button onclick="window.location.href='{{ url('/char/ListViolationRecord')}}'"  class="btnNoWidth">
                        <i class="icon-user icon-large"></i><br/>特定條規違規排名
                    </button>
                    <button onclick="window.location.href='{{ url('/char/EngineerSafetyViolationRank')}}'"  class="btnNoWidth">
                        <i class="icon-user icon-large"></i><br/>工安違規排名
                    </button>   
                    
                    {{--<button onclick="window.location.href='{{ url('/char/ContractorViolationRecord') }}'" class="btnNoWidth">--}}
                         {{--<i class="icon-user icon-large"></i><br/>承攬商違規紀錄--}}
                    {{--</button>--}}
                    <button onclick="window.location.href='{{ url('/char/ContractorViolationRank') }}'"  class="btnNoWidth">
                        <i class="icon-user icon-large"></i><br/>承攬商違規排名
                    </button>
                                     
                    {{--<button onclick="window.location.href='{{ url('/char/DepartmentViolationRank') }}'"  class="btnNoWidth">--}}
                        {{--<i class="icon-list-alt icon-large"></i><br/>部門違規排名--}}
                    {{--</button>--}}
                    <!--
                     <button class="btn"><i class="icon-search icon-large"></i><br/>Search</button> 客製化-->
                
                </div>
            </div>
        </div>
    </div>
</div>
@yield('char')
@endsection