<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\phpStudy\WWW\frit\fruits\public/../application/home\view\userinfo\user.html";i:1492692299;}*/ ?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1,user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
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
	<title>水果拼团网站</title>
	<base href="__PUBLIC__">
    <link rel="stylesheet" href="home/css/index.css"/>
</head>
<body>
	<div id="user-b">
		<!--html5 nav-->
		<nav class="j-nav navbar">
	        <div class="logo fl">
				<a href="index.html"></a>
			</div>
			<span class="user-title">个人中心</span>
			<div class="shopping-cart fr">
				<a href="index.html"></a>
			</div>
	    </nav>
		<section class="m-component-user" id="m-user">
	        <div class="m-user-avatar text-center">
	            <span class="avatarPic"><img style="display: inline;" class="lazy img-circle" src="home/images/user-img0.jpg"></span>

	        </div>
	        
	        <div class="head_list">
	        	<ul class="m-user-list">
	        		<li><span>￥<?= $one[0]['u_balance']?></span><br>账户余额</li>
	        		<li><span class="bar"></span>
	        		<span>	        			
	        			<?php if($one['0']['u_price'] == '200'): ?>
	        			普通用户
	        			<?php else: ?> 
	        			会员用户
	        			<?php endif; ?>
	        		</span>
	        		<br>等级</li>
	        		<li><a href="myorder.html"><span class="bar"></span><span>2</span><br>我的订单</a></li>
	        	</ul>
	        </div>
	        <ul class="m-user-content">
	            <!-- <li>
	                <div class="m-user-item">
	                   <a href="/user/orders" class="user-order">邀请好友得大礼包</a>
	                </div>
	                <div class="m-user-item">
	                   <a href="groups.html" class="user-coupon">我的团单</a>
	                </div>
	            </li> -->
	            <li>
	            	<div class="m-user-item">
	                   <a href="<?php echo url('home/userinfo/address'); ?>" class="user-site">管理收货地址</a>
	                </div>
	                <div class="m-user-item">
	                   <a href="/user/coupon" class="user-set">设置</a>
	                </div>
	                <div class="m-user-item">
	                   <div class="user-score"><span class="pull-right">400-110110</span>联系客服</div>
	                </div>
	            </li>
	            <li class="m-user-footer">
	            粤ICP备8888888 广东·广州
	            </li>
	        </ul>
	    </section>
	    <!--footer begin-->
		<footer class="footer">
	        <nav>
	            <ul>
	                <li><a href="index.html" class="nav-controller"><div class="fb-home"></div>首页</a></li>
	                <li><a href="groups.html" class="nav-controller"><div class="fb-group"></div>我的拼团</a></li>
	                <li><a href="myorder.html" class="nav-controller"><div class="fb-list"></div>我的订单</a></li>
	                <li><a href="javascript:void(0);" class="nav-controller active"><div class="fb-user"></div>个人中心</a></li>
	            </ul>
	        </nav>
	    </footer>
	    <!--footer end-->
	</div>
</body>
</html>