<<<<<<< HEAD
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\phpStudy\WWW\frit\fruits\public/../application/index\view\login\login.html";i:1492089622;}*/ ?>
=======
<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\phpStudy\WWW\frit\fruits\public/../application/index\view\login\enter.html";i:1492089622;}*/ ?>
>>>>>>> eb97db639d60d030dd9110364e2e8a1b633101a2
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="__PUBLIC__/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

   <!-- Bootstrap Core CSS -->
    <link href="index/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="index/assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link rel="stylesheet" href="index/assets/css/font-awesome.min.css" />


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">鲜果时光系统登录</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="<?php echo url('/index/Login/posts'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="用户名" name="name"  >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">记住密码
										
                                    </label>
									 
                                </div>
								
                                <!-- Change this to a button or input when using this as a form -->
                            
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="登录">
								<div style="text-align:right;">
									<a href="register.html" class="btn ">没有账号密码？点击注册</a>
								</div>
                               
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<script src="index/jquery-2.1.1.min.js"></script>
<script>
   
</script>