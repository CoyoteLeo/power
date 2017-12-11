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
    <div class="row">
        <div id="acct-password-row" class="span16" align="center">
            <form class="form-horizontal" method="POST" action="{{ url('/login/Email') }}" id="form">
                {{ csrf_field() }}
                <legend >忘記密碼</legend><br>
                <div class="control-group" align="center">
                    <label class="control-label">輸入信箱</label>
                    <div class="controls">
                        <input id="challenge-answer-control" name="Email" class="span5" type="text" value="" autocomplete="false">
                    </div>
                </div>
                <footer class="signin-actions">
                    <div align="challenge-answer-control">
                        <input class="btn btn-primary" type="submit" id="submit">
                    </div>
                </footer>
            </form>
        </div>
    </div>
    <script src="{{ URL::asset('js/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery/jquery.validate.min.js') }}"></script>

    <script>
        $("#form").validate({
            rules: {
                Email: {
                    required: true,
                }
            }, messages: {
                Email: {
                    required: "請填寫信箱",
                }
            }
        })
    </script>
@endsection