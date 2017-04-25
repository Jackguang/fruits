<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\cart\orderinfo.html";i:1493117796;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>订单中心</title>
    <base href="__PUBLIC__">
    <link rel="stylesheet" type="text/css" href="car/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="car/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="car/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="car/css/style.css"/>
    <script src="car/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $(".loading").addClass("loader-chanage")
            $(".loading").fadeOut(300)
        })
    </script>
</head>
<!--loading页开始-->
<div class="loading">
    <div class="loader">
        <div class="loader-inner pacman">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!--loading页结束-->
<body>
<header class="top-header fixed-header">
    <a class="icona" href="javascript:history.go(-1)">
        <img src="car/images/left.png"/>
    </a>
    <h3>全部订单</h3>
    <a>已付款</a>
    <a>未付款</a>
    <a class="iconb" href="shopcar.html">

    </a>
</header>

<a href=""></a>
<div class="contaniner fixed-conta">
    <section class="order">
        <?php if(is_array($data) || $data instanceof \think\Collection): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$va): if($va['o_state']==1): ?>
<!--付款-->
        <dl>
            <dt>
                <time><?php echo $va['o_time']; ?></time>
                <span>待发货</span>
            </dt><?php foreach ($list as $k=>$v) {?>
            <ul>
                <a href="detail.html">
                    <figure><img src="<?php echo $v['f_img']; ?>"/></figure>
                    <li>
                        <p><?php echo $v['f_name']; ?>:<?php echo $v['f_title']; ?></p>
                        <small>规格:<?php echo $v['f_weight']; ?></small>
                        <!--<span>尺寸：XL</span>-->
                        <!--<b>￥32.00</b>-->
                        <strong>×<?php echo $num[$k]?></strong>
                        <!--<p><?php echo $va['a_address']; ?></p>-->
                        <!--<small><?php echo $va['a_name']; ?></small>-->
                        <!--<span><?php echo $va['a_tel']; ?></span>-->
                        <!--<b>单号<?php echo $va['o_number']; ?></b>-->
                    </li>
                </a>
            </ul>    <?php }?>
            <dd>
                <h3>商品总额</h3>
                <i>￥<?php echo $va['all_price']; ?>.00</i>
            </dd>
            <dd>
                <input type="button" value="确认收货" class="order-que"/>
                <input type="button" value="查看物流" onclick="javascript:location.href='wuliu.html'" />
                <input type="button" value="取消订单" />
            </dd>
        </dl>


        <?php endif; ?>



        <!--<dl>-->
            <!--<dt>-->
                <!--<time>2015-11-15 22:55:59</time>-->
                <!--<span>待发货</span>-->
            <!--</dt>-->
            <!--<ul>-->
                <!--<a href="detail.html">-->
                    <!--<figure><img src="images/classify-ph03.png"/></figure>-->
                    <!--<li>-->
                        <!--<p>超级大品牌服装，现在够级大品牌服装，现在够买只要998</p>-->
                        <!--<small>颜色：经典绮丽款</small>-->
                        <!--<span>尺寸：XL</span>-->
                        <!--<b>￥32.00</b>-->
                        <!--<strong>×3</strong>-->
                    <!--</li>-->
                <!--</a>-->
            <!--</ul>-->
            <!--<dd>-->
                <!--<h3>商品总额</h3>-->
                <!--<i>￥98.00</i>-->
            <!--</dd>-->
            <!--<dd>-->
                <!--<input type="button" value="确认收货" class="order-que"/>-->
                <!--<input type="button" value="查看物流" onclick="javascript:location.href='wuliu.html'" />-->
                <!--<input type="button" value="取消订单" />-->
            <!--</dd>-->
        <!--</dl>-->
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <!--<dl>-->
            <!--<dt>-->
                <!--<time>2015-11-15 22:55:59</time>-->
                <!--<span>待发货</span>-->
            <!--</dt>-->
            <!--<ul>-->
                <!--<a href="detail.html">-->
                    <!--<figure><img src="images/classify-ph03.png"/></figure>-->
                    <!--<li>-->
                        <!--<p>超级大品牌服装，现在够级大品牌服装，现在够买只要998</p>-->
                        <!--<small>颜色：经典绮丽款</small>-->
                        <!--<span>尺寸：XL</span>-->
                        <!--<b>￥32.00</b>-->
                        <!--<strong>×3</strong>-->
                    <!--</li>-->
                <!--</a>-->
            <!--</ul>-->
            <!--<dd>-->
                <!--<h3>商品总额</h3>-->
                <!--<i>￥98.00</i>-->
            <!--</dd>-->
            <!--<dd>-->
                <!--<input type="button" value="确认收货" class="order-que"/>-->
                <!--<input type="button" value="查看物流" onclick="javascript:location.href='wuliu.html'" />-->
                <!--<input type="button" value="取消订单" />-->


            <!--</dd>-->
        <!--</dl>-->
    </section>
</div>





</body>
</html>