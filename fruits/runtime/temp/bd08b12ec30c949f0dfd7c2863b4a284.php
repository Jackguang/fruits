<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\cart\payfor.html";i:1493104818;}*/ ?>
<?php
use think\Session;
$uid=Session::get('u_id');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <base href="__PUBLIC__">
    <!-- 启用360浏览器的极速模式(webkit) -->
    <meta name="renderer" content="webkit">
    <!-- 避免IE使用兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
    <meta name="HandheldFriendly" content="true">
    <!-- 微软的老式浏览器 -->
    <meta name="MobileOptimized" content="320">
    <!-- uc强制竖屏 -->
    <meta name="screen-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <!-- UC应用模式 -->
    <meta name="browsermode" content="application">
    <!-- QQ应用模式 -->
    <meta name="x5-page-mode" content="app">
    <!-- windows phone 点击无高光 -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- 适应移动端end -->
    <title>订单详情</title>
    <link rel="stylesheet" href="home/css/index.css"/>
</head>
<body>
<div id="user-b" class="od-box">
    <!--html5 nav-->
    <nav class="j-nav navbar">
        <div class="logo fl">
            <a href="myorder.html"></a>
        </div>
        <span class="user-title">订单详情</span>
        <div class="shopping-cart fr">
            <a href="index.html"></a>
        </div>
    </nav>
    <div class="od-details">
        <!-- 订单进度，生效追加样式“-cur”即可 -->
        <div class="od-express">
            <ul>
                <li class="place place-cur">
                    提交订单
                </li>
                <li class="delivery">
                    配送中
                </li>
                <li class="sign">
                    签收成功
                </li>
            </ul>
        </div>
    </div>
    <!-- 订单信息 -->
    <div class="od-infor">
        <table cellpadding="1" cellspacing="0">
            <tr>
                <td width="80px;">订单状态:</td>
                <td class="od-red">已付款</td>
            </tr>
            <tr>
                <td>总额:</td>
                <td class="od-red"><?php echo $data['all_price']; ?>.00 <span>(微信支付)</span></td>
            </tr>
            <tr>
                <td>送至:</td>
                <td><?php echo $data['a_address']; ?></td>
            </tr>
            <tr>
                <td>收货人:</td>
                <td><?php echo $data['a_name']; ?><?php echo $data['a_tel']; ?></td>
            </tr>
            <tr>
                <td>订单编号:</td>
                <td><?php echo $data['o_number']; ?></td>
            </tr>
            <tr>
                <td>下单时间:</td>
                <td><?php echo $data['o_time']; ?></td>
            </tr>
        </table>
    </div>
    <!-- 商品详情 -->
    <h4>商品详情</h4>
    <?php foreach ($list as $k=>$v) {?>
    <div class="mc-sum-box">
        <div class="myorder-sum fl"><img src="<?php echo $v['f_img']; ?>"></div>
        <div class="myorder-text">
            <h1><?php echo $v['f_name']; ?> </h1>
            <h2><?php echo $v['f_weight']; ?></h2>
            <div class="myorder-cost">
                <span>数量:<?php echo $num[$k]?></span>
                <span class="mc-t">￥<?php echo $v['m_price']; ?>.00/件</span>
            </div>
        </div>
    </div>
    <?php }?>
    <!--footer begin-->
    <footer class="footer">
        <nav>
            <ul>
                <li><a href="<?php echo url('home/Fruits/index'); ?>" class="nav-controller"><div class="fb-home"></div>首页</a></li>
                <!--<li><a href="<?php echo url('home/Fruits/classifyin'); ?>" class="nav-controller"><div class="fb-group"></div>分类</a></li>-->
                <li><a href="javascript:void(0);" class="nav-controller active"><div class="fb-list"></div>本订单</a></li>
                <li><a href="<?php echo url('home/Cart/orderinfo'); ?>" class="nav-controller"><div class="fb-list"></div>我的订单</a></li>
                <li><a href="<?php echo url('home/userinfo/user'); ?>" class="nav-controller"><div class="fb-user"></div>个人中心</a></li>
            </ul>
        </nav>
    </footer>
    <!--footer end-->
</div>
</body>
</html>