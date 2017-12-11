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
<div class="signin-row row" style="font-family: Microsoft YaHei">
    <div class="span4">
    </div>
    <div class="span8">
        <div class="container-signin">
        <legend>請登入</legend>
            <form class="form-horizontal" method="POST" action="{{ url('/login/login') }}" id="Power">
                {{ csrf_field() }}
                <div class="form-inner">
                    {{--<div class="input-prepend">--}}
                        {{--<span class="add-on" rel="tooltip" title="E-Mail" data-placement="top"><i class="icon-envelope"></i></span>--}}
                        {{--<input id="Email" type='text' class='span4' name='Email' />--}}
                    {{--</div>--}}
                    {{--<div class="input-prepend">--}}
                        {{--<span class="add-on"><i class="icon-key"></i></span>--}}
                        {{--<input type='password' class='span4' id='password' name="password" required/>--}}
                    {{--</div>--}}
                        {{--<label class="checkbox" for='remember_me'>--}}
                            {{--<input type='checkbox' id='remember_me' name=""/>--}}
                            {{--<a href="{{ url('/login/QueryPassword') }}"> 忘記密碼</a>--}}
                        {{--</label>--}}
                    <input id="Email" type='text' class='span4' name='Email' placeholder="請輸入帳號"/>
                    <input type='password' class='span4' id='password' name="password" placeholder="請輸入密碼" required/>
                    <a href="{{ url('/login/QueryPassword') }}"> 忘記密碼</a>
                </div>
                <footer class="signin-actions">
                    <div align="right">
                        <input class="btn btn-primary" type="submit" id="">
                    </div>
                </footer>

            </form>
        </div>
    </div>
</div>
<script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>
<script>
    $("#Power").validate({
        rules: {
            Email: {
                required: true,
            },password:{
                required: true,
            }
        }, messages: {
            Email: {
                required: "請填寫帳號",
            },password: {
                required: "請填寫密碼",
            }
        }
    })
</script>
@endsection