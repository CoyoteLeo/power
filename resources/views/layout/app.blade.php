<!DOCTYPE html>
<html lang="en">
    <!-- Header設定-->
    @include("partials.header")
    <body>
    <!-- top欄-->
        @include("partials.top_navbar")       
        <div id="body-container">
            <!-- 主功能按鈕  -->
            @include("partials.top_button")
            <!-- 子畫面-->
            <section class="page container">
                @yield('content')
            </section> 
        </div>
    <!-- foot設定-->
    @include("partials.foot")
	</body>
</html>