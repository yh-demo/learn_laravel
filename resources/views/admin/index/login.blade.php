<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{ asset('/admin/lib/html5shiv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/admin/lib/respond.min.js') }}"></script>
    <![endif]-->
    <link href="{{ asset('/admin/static/h-ui/css/H-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/static/h-ui.admin/css/H-ui.login.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/static/h-ui.admin/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin/lib/Hui-iconfont/1.0.8/iconfont.css') }}" rel="stylesheet" type="text/css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{ asset('/admin/lib/DD_belatedPNG_0.0.8a-min.js') }}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>后台登录</title>
</head>
<style>
    .top-header {
        top: 0;
        height: 60px;
    }
</style>
<body>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <div class="row cl">
            <div class="formControls col-xs-12 text-c f-30">
                <strong>后台管理系统</strong>
            </div>
        </div>
        <form class="form form-horizontal" action="{{ route('login-action') }}" id="form">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="account" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" name="verify" value="验证码:" style="width:150px;">
                    <img id="captcha" src="{{ captcha_src() }}" data-src="{{ captcha_src() }}" onclick="this.src=this.getAttribute('data-src')+Math.random()">
                </div>
            </div>

            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" id="submit" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                    <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">Copyright 你的公司名称 </div>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>

</body>
</html>
<script>
    $(function(){
        $("#submit").click(function(){
            $.ajax({
                    url : $("#form").attr('action'),
                    type: "POST",
                    data : $("#form").serialize(),
                    dataType : 'json',
                    complete: function (XMLHttpRequest, textStatus) {
                        var responseText = eval('('+XMLHttpRequest.responseText+')')
                        alert(responseText.msg)
                        if(!responseText.code){
                            window.location.href = responseText.url
                        } else {
                            $("#captcha").attr('src',$("#captcha").data('src')+Math.random())
                        }
                    }
                }
            )
        })
    })
</script>