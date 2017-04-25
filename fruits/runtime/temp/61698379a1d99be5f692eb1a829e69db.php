<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"E:\study\HHH\liupeng\fruits\fruits\public/../application/home\view\reply\reply_show.html";i:1493092303;}*/ ?>
<?php
use think\Session;
$uid=Session::get('u_id');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>爱到家-社区生鲜</title>
    <base href="__PUBLIC__">

    <!-- Bootstrap -->
    <link href="home/css/bootstrap.min.css" rel="stylesheet">
    <link href="home/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/css/alongsty.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="home/js/html5shiv_min.js"></script>
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
        <div class="col-xs-2" style="padding-left:25px;"><i class="icon-angle-left font32" onclick="javascript:window.history.back();"></i></div>
       <font color="#663399" size="5px;">请评价您的订单</font>
        <div class="col-xs-2" >
            <div class="icon_shopcar">

            </div>
        </div>
    </div>
</div><!-- toper -->
<div class="height53"></div>
<div class="height20"></div>
<div class=" container-fluid">
    <div class="row">
        <div class="table">
            <center>订单编号：<?php echo $arr['o_number']; ?></center>
            <center>订单创建时间：<?php echo $arr['o_time']; ?></center>
            <br>
            <?php foreach($date as $k=>$v) { ?>
            <div class="col-xs-6" style="padding-right:5px;" >
                <div class="thumbnail" style="padding:0px;">
                    <a href="<?php echo url('home/Fruits/info'); ?>?id=<?php echo $v['f_id']; ?>"><div class="sosophoto"><img src="<?php echo $v['f_img']; ?>" width="160" height="120"></div></a>
                    <div class="caption">
                        <h4><?php echo $v['f_name']; ?></h4>
                        <span class="color_gray"><?php echo $v['f_title']; ?></span>
                        <p class="color_gray"><span class="font16 color_orange">¥ <?php echo $v['m_price']; ?></span>/斤<span class="font16 color_orange">*<?php echo $arr['o_num'][$k]; ?></span></p>
                        <span class="font16 color_green"><?php echo '共：'.$v['m_price']*$arr['o_num'][$k]?>元</span>
                        <div class="text-center"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <center style="color: green; font-size: 20px;">总价：￥<?php echo $arr['all_price']; ?>(已签收)</center>
            <form action="<?php echo url('home/reply/reply_add'); ?>" method="post">
            <center><textarea cols="40" rows="5" name="opinion_content" placeholder="谢谢的宝贵建议...."></textarea>
                <input type="hidden" name="o_id" value="<?php echo $arr['o_id']; ?>"><button type="submit" style="width: 82px;height: 45px;">提交</button></center>

                <!--<input type="submit" value="提交">-->
            </form>
        </div>

</div>
    </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="home/js/jquery_min1_11_2.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="home/js/bootstrap.min.js"></script>
</body>
</html>
<script src="js/jq.js"></script>
<script>
</script>