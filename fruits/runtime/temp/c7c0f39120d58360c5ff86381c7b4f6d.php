<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\activty\act_show.html";i:1493016793;}*/ ?>
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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="home/css/swiper.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="home/js/html5shiv_min.js"></script>
    <script src="home/js/respond_min.js"></script>
    <![endif]-->
    <style type="text/css">
        <!--
        body{ background:#eeeeee;  font-family:"微软雅黑"; }
        input[type="text"],input[type="password"],input[type="date"],input[type="month"],input[type="month"],input[type="time"],input[type="week"],input[type="email"],select{border:none; outline:none; transition:border 0.2s ease-in 0s;  }
        input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}		input[type="text"]:focus,input[type="password"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="email"]:focus,select:focus{border:1px solid #17a862;  }
        -->
    </style>
</head>
<body >
<div class="toper navbar-fixed-top">
    <div class="row color_white " >
        <div class="col-xs-2" style="padding-left:25px;"><a class="cwhite" href="#"><i class="icon-angle-left font32"></i></a></div>
        <div class="col-xs-8 text-center font20">商品详情</div>
        <div class="col-xs-2" >
            <div class="icon_shopcar">
                <div class="icon_shopcar_ts">15</div>
                <a class="cwhite" href="#"><div class="photo_30"><img src="images/icon_shopcar.png" alt="购物车"></div></a>
            </div>
        </div>
    </div>
</div><!-- toper -->
<div class="height53"></div>
<?php if(is_array($arr) || $arr instanceof \think\Collection): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="productphoto">
                <a href=""><img src="<?php echo $v['f_img']; ?>" style="width: 310px;" height="89" alt=""></a>
                <span style="position: absolute; top: 0; left: 0; padding-left: 10px; padding-top: 150px;"><h4 style="color: black;"><b><?php echo $v['f_name']; ?></b><br>
                    <span style="font-size: 11px; color: lightgrey">(<?php echo $v['f_title']; ?>)</span><br>
                    <span style="font-size: 13px;">市场价：<del><?php echo $v['m_price']; ?></del></span><br>
                    <span style="font-size: 15px; color: red">促销价：<?php echo $v['v_price']; ?></span><br>


                </h4></span>
            </div>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?><br><br><br><div class="footer navbar-fixed-bottom">
    <div class="row">
        <div class="col-xs-3 text-center" style=" padding-top:5px;">
            <a class="cgreen" href="index.html"><div class="photo_30"><img src="home/images/nav11.png"><br>首页</div></a>
        </div>
        <div class="col-xs-3  text-center" style=" padding-top:5px;">
            <a class="cgray" href="<?php echo url('home/Fruits/classifyin'); ?>"><div class="photo_30"><img src="home/images/nav2.png"><br>分类</div></a>
        </div>
        <div class="col-xs-3  text-center" style=" padding-top:5px;">
            <a class="cgray" href="<?php echo url('home/Cart/index'); ?>"><div class="photo_30"><img src="home/images/nav3.png"><br>购物车</div></a>
        </div>
        <div class="col-xs-3  text-center" style="padding-top:5px;">
            <a class="cgray" href="login.html"><div class="photo_30"><img src="home/images/nav4.png"><br>我的</div></a>
        </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script><!-- 焦点图 -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery_min1_11_2.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>