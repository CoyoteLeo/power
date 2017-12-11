@extends('char.index')
@section('char')

<div class="row">
    <div class="span16">
        <div class="box">
            <div class="box-header"> 
                <i class="icon-bar-chart"></i>
                <h5>前十大違規條例 直方圖</h5>
            </div>
            <div class="blockoff-left">
                <div id="top10"></div>
            </div>
        </div>
    </div>
    <div class="span16">
        <div class="box">
            <div class="box-header"> 
                <i class="icon-bar-chart"></i>
                <h5>工安違規大項 圓餅圖</h5>
            </div>
            <div class="box-content">
                <div id="piechart"></div>
            </div>
        </div>
    </div>
    <div class="span16">
        <div class="box">
            <div class="box-header"> 
                <i class="icon-bar-chart"></i>
                <h5>工安違規大項 直方圖</h5>
            </div>
            <div class="blockoff-left">
                <div id="barchart"></div>
{{--                <a href="{{url( '/api/csv/download/EngineerSafetyViolationRank' )}}">數據Xls檔案下載</a>--}}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    google.load('visualization', '1', {'packages': ['corechart']});
    google.setOnLoadCallback(drawVisualization);
    
    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['違規大項', '總和'],
          @foreach ($datas as $data)
          ["{{$data['item']}}", {{$data['sum']}} ],
          @endforeach 
        ]);
        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.load('visualization', '1', {'packages': ['corechart']});
    google.setOnLoadCallback(drawVisualization);
    
    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['違規大項', '罰金總和'],
          @foreach ($datas as $data)
          ["{{$data['item']}}", {{$data['fine']}} ],
          @endforeach 
        ]);
        var options = {
          title: ''
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('barchart'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.load('visualization', '1', {'packages': ['corechart']});
    google.setOnLoadCallback(drawVisualization);
    
    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['違規條款', '數量'],
          @foreach ($Top10s as $Top10)
            ['條文 {{ $Top10->Terms->ItemB }}-{{ $Top10->Terms->ItemL }}', {{$Top10->sum}} ],
          @endforeach
        ]);
        var options = {
          title: ''
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('top10'));

        chart.draw(data, options);
    }
</script>
@endsection