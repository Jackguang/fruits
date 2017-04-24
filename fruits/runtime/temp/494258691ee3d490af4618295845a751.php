<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\cart\zui.html";i:1492847935;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>购物车</title>
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
<body>
<header class="page-header">
    <h3>购物车</h3>
</header>

<div class="contaniner fixed-contb">
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar" onselectstart="return false"></label>
            <input type="checkbox" id="shopcar"/>
        </div>
        <figure><img src="car/images/index-ph02.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要9298</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="13" />
                <span>+</span>
            </div>
            <h3>￥6353.00</h3>
            <small><img src="car/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar" onselectstart="return false"></label>
            <input type="checkbox" id="shopcar"/>
        </div>
        <figure><img src="car/images/index-ph02.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要9298</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="13" />
                <span>+</span>
            </div>
            <h3>￥6353.00</h3>
            <small><img src="car/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar" onselectstart="return false"></label>
            <input type="checkbox" id="shopcar"/>
        </div>
        <figure><img src="car/images/index-ph02.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要9298</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="13" />
                <span>+</span>
            </div>
            <h3>￥6353.00</h3>
            <small><img src="car/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <section class="shopcar">
        <div class="shopcar-checkbox">
            <label for="shopcar" onselectstart="return false"></label>
            <input type="checkbox" id="shopcar"/>
        </div>
        <figure><img src="car/images/index-ph02.png"/></figure>
        <dl>
            <dt>超级大品牌服装，现在买只要9298</dt>
            <dd>颜色：经典绮丽款</dd>
            <dd>尺寸：L</dd>
            <div class="add">
                <span>-</span>
                <input type="text" value="13" />
                <span>+</span>
            </div>
            <h3>￥6353.00</h3>
            <small><img src="car/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <!--去结算-->
    <div style="margin-bottom: 16%;"></div>

</div>
<script type="text/javascript">

    $(".shopcar-checkbox label").on('touchstart',function(){

        if($(this).hasClass('shopcar-checkd')){
            var id = $(this).attr('alt');
            var nowp = $('#allprice').html();
            var price = $(this).attr('alp');
            var num=$(".n"+id).val();
            var allprice = parseInt(nowp)-parseInt(num*price);
            var price_html=allprice;
            $('#allprice').html(price_html)
            $(this).addClass("shopcar-checkd")

            $(this).removeClass("shopcar-checkd")
        }else{
            var id = $(this).attr('alt');
            var nowp = $('#allprice').html();
            var price = $(this).attr('alp');
            var num=$(".n"+id).val();
            var allprice = parseInt(num*price)+parseInt(nowp);
            var price_html=allprice;
            $('#allprice').html(price_html)
//            var num=$(this).parent().next().next().nth-child(3).nth-child(2).val();
//            alert(num);
//            alert(id);
            $(this).addClass("shopcar-checkd")
        }
    })
</script>
<footer class="page-footer fixed-footer">
    <div class="shop-go">
        <b>合计：￥1108.90</b>
        <span><a href="buy.html">去结算（2）</a></span>
    </div>
    <ul>
        <li>
            <a href="index.html">
                <img src="car/images/footer001.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="assort.html">
                <img src="car/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li class="active">
            <a href="shopcar.html">
                <img src="car/images/footer03.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="self.html">
                <img src="car/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>


</body>
</html>