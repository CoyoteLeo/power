<div id="body-content" style="font-family: Microsoft YaHei;font-weight: normal;">
    <div class="body-nav body-nav-horizontal body-nav-fixed">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><i class="icon-home icon-large"></i>
                        <font size="3"><b>首頁</b></font>
                    </a>
                </li>
                @if (Auth::guard('power_plant_staffs')->check())
                <li><a href="{{ url('/history/CheckRecordItemAll') }}"><i class="icon-list-alt icon-large"></i>
                        <font size="3"><b style="font-family: Microsoft YaHei;font-weight: normal;">查核紀錄</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/history/InspectionCheckItemAll') }}"><i class="icon-list-alt icon-large"></i>
                        <font size="3"><b style="font-family: Microsoft YaHei;font-weight: normal;">工安巡檢</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/char') }}"><i class="icon-bar-chart icon-large"></i>
                        <font size="3"><b style="font-family: Microsoft YaHei;font-weight: normal;">報表統計</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/history') }}"><i class="icon-calendar icon-large"></i>
                        <font size="3"><b style="font-family: Microsoft YaHei;font-weight: normal;">歷史紀錄</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/list') }}"><i class="icon-folder-open icon-large"></i> 
                        <font size="3"><b style="font-family: Microsoft YaHei;font-weight: normal;">條文查詢</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/manage') }}"><i class="icon-dashboard icon-large"></i> 
                        <font size="2"><b style="font-family: Microsoft YaHei;font-weight: normal;">管理員</b></font>
                    </a>
                </li>
                <!--
                <li><a href="{{ url('/api/json') }}"><i class="icon-dashboard icon-large"></i> 
                        <font size="2"><b>Json</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/api/csv') }}"><i class="icon-dashboard icon-large"></i> 
                        <font size="2"><b>Csv</b></font>
                    </a>
                </li>
                <li><a href="{{ url('/api/mobile') }}"><i class="icon-dashboard icon-large"></i> 
                        <font size="2"><b>mobile</b></font>
                    </a>
                </li>
                -->
                @endif
            </ul>
        </div>
    </div>
</div>