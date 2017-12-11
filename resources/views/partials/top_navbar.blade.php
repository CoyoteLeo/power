<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button class="btn btn-navbar" data-toggle="collapse" data-target="#app-nav-top-bar"></button>
            <a href="{{ url('/') }}" class="brand"><i class="icon-wrench" style="font-family: Microsoft YaHei">台中發電廠工安巡檢資訊系統</i></a>
            <div id="app-nav-top-bar" class="nav-collapse">
                <ul class="nav pull-right">
                    @if (Auth::guard('power_plant_staffs')->check())
                        <li >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('power_plant_staffs')->user()->Name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/home/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/login/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('/') }}">Login</a></li>
                        <!--<li><a href="{{ url('/login/register') }}">Register</a></li>-->
                        <!-- {{ route('register') }}-->
                        
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>