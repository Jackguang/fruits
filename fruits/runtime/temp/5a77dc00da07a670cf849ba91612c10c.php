<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\user\enter.html";i:1492744062;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <base href="__PUBLIC__">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>爱到家-社区生鲜</title>

    <!-- Bootstrap -->
    <link href="home/css/bootstrap.min.css" rel="stylesheet">
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/css/alongsty.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="home//html5shiv_min.js"></script>
    <script src="home/js/respond_min.js"></script>
    <![endif]-->
    <style type="text/css">
        <!--
        body{ background:#eeeeee;  font-family:"微软雅黑";}
        input[type="text"],input[type="password"],input[type="date"],input[type="month"],input[type="month"],input[type="time"],input[type="week"],input[type="email"],select{border:none; outline:none; transition:border 0.2s ease-in 0s;  }
        input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}		input[type="text"]:focus,input[type="password"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="email"]:focus,select:focus{border:1px solid #17a862;  }
        -->
    </style>
</head>
<body >
<div class="toper navbar-fixed-top">
    <div class="row color_white " >
        <div class="col-xs-2"><a href="#"><div class="photo_30"><img src="home/images/icon_close.png" alt="关闭"></div></a></div>
        <div class="col-xs-8 text-center font20">快速登录</div>
        <div class="col-xs-2">&nbsp;</div>
    </div>
</div><!-- toper -->
<div class="height53"></div>
<div class="height20"></div>
<div class=" container-fluid" >
    <form class="form-horizontal" action="<?php echo url('home/user/enter_d'); ?>" method="post" onsubmit="return yan();">
        <div class="form-group form-group-lg">
            <div class="col-xs-12">
                <input type="text" class="form-control" onblur="names()" name="u_name" id="u_name" placeholder="请输入设置的用户名">
                <span id="name_s"></span>
            </div>
        </div>

        <div class="form-group form-group-lg">
            <div class="col-xs-12">
                <input type="password" class="form-control" onblur="pwds()" name="u_pwd" id="pwd" placeholder="请输入设置的密码">
                <span id="pwd_s"></span>
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-xs-12">
                <input type="password" class="form-control" onblur="pwrs()" name="pwr" id="pwr" placeholder="请再次确认密码">
                <span id="pwr_s"></span>

            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-xs-12">
                <input type="text" class="form-control" onblur="phones()" name="u_tel" id="phone" placeholder="请输入手机号">
                <span id="phone_s"></span>
            </div>
        </div>
        <div class="height10"></div>
        <div class="form-group form-group-lg">
            <div class="col-xs-7" style="padding-right:0px;">
                <input type="text" class="form-control" onblur="codes()" name="code" id="code" placeholder="验证码">
                <span id="code_s"></span>
            </div>
            <div class="col-xs-5">
                    <!--<button type="submit" class="btn btn-success btn-lg btn-group-justified" >获取验证码</button>-->
                        <input type="button" class="btn btn-success btn-lg btn-group-justified" disabled  id="btn" value="获取验证码" />
            </div>
        </div>
        <div class="height10"></div>
        <div class="form-group">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-success btn-lg btn-group-justified" id="but" disabled>注册</button>
            </div>
        </div>
    </form>
    <div class="height10"></div>
    <div class=" width100 text-center font16 color_gray"> 点击注册，即表示您同意<a href="#">《免责声明》</a></div>
    <div class=" width100 text-center font16 color_gray"> 如果你有账号，请点击 <a href="<?php echo url('home/user/login'); ?>">登录</a></div>
</div><!-- 中部 -->

<!-- jQuery (necessary for Bootstrap's JavaScript p lugins) -->
<script src="home/js/jquery_min1_11_2.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="home/js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">
//    <!--获取验证码，有效性60秒-->
        var wait=60;
        function time(o) {
            if (wait == 0) {
                o.removeAttribute("disabled");
                o.value="免费获取验证码";
                wait = 60;
            } else {
                o.setAttribute("disabled", true);
                o.value="重新发送(" + wait + ")";
                wait--;
                setTimeout(function() {
                            time(o)
                        },
                        1000)
            }
        }
    document.getElementById("btn").onclick=function(){time(this);}
//        判断密码
    function pwds(){
        var pwd=$('#pwd').val();
        var reg=/^[a-z0-9_-]{6,16}$/;
        if(!reg.test(pwd))
        {
            document.getElementById('pwd_s').innerHTML='<font style="color: red">密码最少六位以上</font>';
            return false;
        }
        else
        {
            document.getElementById('pwd_s').innerHTML='<font style="color: red"></font>';
        }
    }
//        判断再次输入密码
    function pwrs() {
            var pwd=$('#pwd').val();
            var pwr=$('#pwr').val();
            if(pwd!=pwr)
            {
                document.getElementById('pwr_s').innerHTML='<font style="color: red">俩次密码不一致</font>';
                return false;
            }
            else
            {
                document.getElementById('pwr_s').innerHTML='<font style="color: red"></font>';
            }
        }
//        判断用户名
    function names() {
    var username=$('#u_name').val();
    var reg=/^[a-z0-9_-]{3,16}$/;
    if(reg.test(username)){
        $.ajax({
            type: "GET",
            url: "<?php echo url('index.php/home/user/enter_b'); ?>",
            data: "username="+username,
            success: function(msg){
                if(msg=='1')
                {
                    document.getElementById('name_s').innerHTML='<font style="color: red">用户名已使用过了</font>';
                    return false;
                }
                else
                {
                    document.getElementById('name_s').innerHTML='<font style="color: red"></font>';
                }
            }
        });
    }else {
        document.getElementById('name_s').innerHTML='<font style="color: red">用户名格式不正确</font>';
        return false;
    }
}
//        判断手机号
    function phones() {
        var phone=$('#phone').val();
        var num=$('#phone').val().length;
        if(num!=11){
            document.getElementById('phone_s').innerHTML='手机号不是11位，请重新输入';
            return false;
        }
        var reg=/^1[5873]\d{9}$/;
        if(reg.test(phone)){
            $.ajax({
                type: "GET",
                url: "<?php echo url('index.php/home/user/enter_b'); ?>",
                data: "phone="+phone,
                success: function(msg) {
                    if (msg == '1') {
                        document.getElementById('phone_s').innerHTML='<font style="color: red">手机号已使用过了</font>手机号已使用过了';
                    }
                    else
                    {
                        document.getElementById('phone_s').innerHTML='<font style="color: green">可以使用</font>';
                        $('#btn').removeAttr('disabled');

                    }

                }
            });
        }else {
            document.getElementById('phone_s').innerHTML='<font style="color: red">手机号格式不正确</font>';
        }
    }
//        判断验证码
    function codes() {
            var code=$('#code').val();
            $.ajax({
                type: "GET",
                url: "<?php echo url('index.php/home/user/code'); ?>",
                data: "code="+code,
                success: function(msg) {
                    if (msg == '1') {
                        document.getElementById('code_s').innerHTML='<font style="color: green">验证成功</font>';
                        $('#but').removeAttr('disabled');
                    }
                    else
                    {
                        document.getElementById('code_s').innerHTML='<font style="color: red">验证码失效或不正确</font>';
                        return false;

                    }
                }
            });
        }
//        获取验证码
    $('#btn').click(function(){
        var phone=$('#phone').val();
        var num=$('#phone').val().length;
        if(num!=11){
            document.getElementById('phone_s').innerHTML='手机号不是11位，请重新输入';
            return false;
        }
        $.ajax({
            type: "GET",
            url: "<?php echo url('index.php/home/user/enter'); ?>",
            data: "phone="+phone,
            success: function(msg){
                alert('已发送');
            }
        });
    });
//        判断选项是否合格
    function yan() {
        var username=$('#u_name').val();
        var reg=/^[a-z0-9_-]{3,16}$/;
        if(reg.test(username)){
            $.ajax({
                type: "GET",
                url: "<?php echo url('index.php/home/user/enter_b'); ?>",
                data: "username="+username,
                success: function(msg){
                    if(msg=='1')
                    {
                        document.getElementById('name_s').innerHTML='<font style="color: red">用户名已使用过了</font>';
                        return false;
                    }
                }
            });
        }else {
            document.getElementById('name_s').innerHTML='<font style="color: red">用户名格式不正确</font>';
            return false;
        }
        var pwd=$('#pwd').val();
        var reg=/^[a-z0-9_-]{6,16}$/;
        if(!reg.test(pwd))
        {
            document.getElementById('pwd_s').innerHTML='<font style="color: red">密码最少六位以上</font>';
            return false;
        }


        var pwd=$('#pwd').val();
        var pwr=$('#pwr').val();
        if(pwd!=pwr)
        {
            document.getElementById('pwr_s').innerHTML='<font style="color: red">俩次密码不一致</font>';
            return false;
        }

        var phone=$('#phone').val();
        var num=$('#phone').val().length;
        if(num!=11){
            alert('手机号不是11位，请重新输入');
            return false;
        }
        var reg=/^1[5873]\d{9}$/;
        if(reg.test(phone)){
            $.ajax({
                type: "GET",
                url: "<?php echo url('index.php/home/user/enter_b'); ?>",
                data: "phone="+phone,
                success: function(msg) {
                    if (msg == '1') {
                        alert('手机号已使用过了')
                        return false;
                    }
                }
            });
        }else {
            alert('手机号格式不正确');
            return false;
        }
        return true;
    }
























    //    document.getElementById("btn").onclick=function(){time(this);}
//    $("#phone").blur(function(){
//        var phone=$("#phone").val();
//        var reg=/^1[5873]\d{9}$/;
//        if(!reg.test(phone)) {
//            document.getElementById("phone_b").innerHTML="<font style='color:red'>手机号格式不正确</font>";
//        }
//    });
//    $("#u_name").blur(function(){
//        var u_name=$("#u_name").val();
//        var reg=/^[a-z0-9_-]{3,16}$/;
//        if(!reg.test(u_name)) {
//            document.getElementById("name_b").innerHTML="<font style='color:red'>用户名不正确</font>";
//        }
//    });
</script>