@extends('layout.app')
@section('content')
<div class="row">
    <div class="span4">
        <div class="blockoff-right">
            <ul id="list-list" class="nav nav-list">
                <li class="nav-header">條文</li>
                <!--
                <li class="active">
                    <a id="view-all" href="#">
                        <i class="icon-chevron-right pull-right"></i>
                        <b>全部條文</b>
                    </a>
                </li>
                -->
                <li>
                    <a href="#list-1"><i class="icon-chevron-right pull-right"></i>墜落</a>
                </li>
                <li>
                    <a href="#list-2"><i class="icon-chevron-right pull-right"></i>感電</a>
                </li>
                <li>
                    <a href="#list-3"><i class="icon-chevron-right pull-right"></i>火災及爆炸</a>
                </li>
                <li>
                    <a href="#list-4"><i class="icon-chevron-right pull-right"></i>中毒及缺氧</a>
                </li>
                <li>
                    <a href="#list-5"><i class="icon-chevron-right pull-right"></i>發生職業災害及重大違規</a>
                </li>
                <li>
                    <a href="#list-6"><i class="icon-chevron-right pull-right"></i>其他</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="span12">
        <div id="list-1" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>墜落條文資訊</h5>
                <!--
                <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                    <i class="icon-reorder"></i>
                </button>
                -->
            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms1 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-2" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>感電條文資訊</h5>
                
            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms2 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-3" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>火災及爆炸</h5>

            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms3 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-4" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>中毒及缺氧</h5>

            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms4 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-5" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>發生職業災害及重大違規</h5>

            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms5 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="list-6" class="box">
            <div class="box-header">
                <i class="icon-list"></i>
                <h5>其他</h5>

            </div>
            <div class="box-content box-list collapse in">
                <ul>
                    @foreach ($terms6 as  $term )
                    <li>
						@if ($term->Item == 0)
						<H3><font color="green">第{{ $term->ItemL }}條</font></H3>
						@else
						<H3><font color="blue">第{{ $term->ItemL }}-{{ $term->Item }}條</font></H3>
						@endif
                        <p class="news-item-preview">
                            <font size="4"><b>{{ $term->Content }}</b></font>
                        </p>
                        <H3>罰款金額 :{{  number_format($term->Fine)  }}</H3>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
        <script type="text/javascript">
        $(function() {
            $('#list-list.nav > li > a').click(function(e){
                if($(this).attr('id') == "view-all"){
                    $('div[id*="list-"]').fadeIn('fast');
                }else{
                    var aRef = $(this);
                    var tablesToHide = $('div[id*="list-"]:visible').length > 1
                            ? $('div[id*="list-"]:visible') : $($('#list-list > li[class="active"] > a').attr('href'));
                    tablesToHide.hide();
                    $(aRef.attr('href')).fadeIn('fast');
                }
                $('#list-list > li[class="active"]').removeClass('active');
                $(this).parent().addClass('active');
                e.preventDefault();
            });

            $(function(){
                $('table').tablesorter();
                $("[rel=tooltip]").tooltip();
            });
        });
    </script>
@endsection