<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\cart\buy.html";i:1493100159;}*/ ?>
<?php
use think\Session;
$uid=Session::get('u_id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="format-detection" content="telephone=no" />
    <title>男装专区</title>
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
    <h3>去结算</h3>
    <a class="iconb" href="shopcar.html">
    </a>
</header>

<div class="contaniner fixed-cont">
    <section class="to-buy">
        <header>
            <div class="now">
                <span><img src="car/images/map-icon.png"/></span>

                <?php if($address == 2): ?>
                <h3 class="add">请添加收货地址<a href="javascript:void(0)" class="bao">保存</a></h3>
                <input type="hidden" class="uid" value="<?php echo $uid; ?>">
                        <b class="a"><input type="text" name="a_name" placeholder="收货人姓名" class="a_name"></b>
                        <b class="b"><input type="text" name="a_tel" placeholder="收货人手机号" class="a_tel"></b>
                    <b class="c"><input type="text" name="a_address" placeholder="收货地址" class="a_address"></b>

                <?php else: ?>
                <dl>
                    <dt>
                        <b><?php echo $address['a_name']; ?></b>
                        <strong><?php echo $address['a_tel']; ?></strong>
                    </dt>
                    <dd><?php echo $address['a_address']; ?></dd>
                    <p><a href="<?php echo url('home/userinfo/address'); ?>">其他地址</a></p>
                </dl>
                <?php endif; ?>

            </div>


        </header>
        <div class="buy-list">
            <?php foreach ($list as $k=>$v){ ?>
            <ul>
                <a href="detail.html">
                    <figure>
                        <img src="<?php echo $v['f_img']; ?>"/>
                    </figure>
                    <li>
                        <h3><?php echo $v['f_name']; ?></h3>
                        <h3><?php echo $v['f_title']; ?></h3>
							<span>
                                <?php echo $v['f_weight']; ?>
							</span>
                        <b>￥<?php echo $v['m_price']; ?>.00</b>
                        <small>×<?php echo $num[$k]?></small>
                    </li>
                </a>
            </ul>
            <?php }?>

            <dl>
                <dd>
                    <span>运费</span>
                    <small>包邮</small>
                </dd>
                <dd>
                    <span>商品总额</span>
                    <small>￥<?php echo $data['all_price']; ?>.00</small>
                </dd>
                <!--<dt>-->
                    <!--<textarea rows="4" placeholder="给卖家留言（50字以内）"></textarea>-->
                <!--</dt>-->
            </dl>
        </div>

    </section>
    <!--底部不够-->
    <div style="margin-bottom: 9%;"></div>
</div>

<footer class="buy-footer fixed-footer">
    <p>
        <small>总金额</small>
        <b>￥<?php echo $data['all_price']; ?>.00</b>
    </p>

    <input type="button" class="tiao" value="去付款" />
    <input type="hidden" class="oid" value="<?php echo $data['o_id']; ?>">

    <?php if($address != 2): ?>
    <input type="hidden" class="address" value="<?php echo $address['a_id']; ?>" >

    <?php else: ?>
    <input type="hidden" class="address" value="" >

    <?php endif; ?>


    <!--<input type="hidden" class="address" value="<?php echo $address['a_id']; ?>" >-->
</footer>

<script type="text/javascript">
    $(".to-now .tonow label").on('touchstart',function(){
        if($(this).hasClass('ton')){
            $(".to-now .tonow label").removeClass("ton")
        }else{
            $(".to-now .tonow label").addClass("ton")
        }
    })
</script>

</body>
</html>
<script src="js/jq.js"></script>
<script>
    $('.tiao').click(function(){
        var o_id=$('.oid').val();//订单ID
        var address=$('.address').val();//收货地址id

        var str=o_id+','+address;


        window.location.href="<?php echo url('index.php/home/Cart/payfor'); ?>?str="+str;
    })
    //保存地址
    $('.bao').click(function(){
        var a_name=$('.a_name').val();//收货人姓名
        var a_tel=$('.a_tel').val();//收货人电话
        var a_address=$('.a_address').val();//收货人地址
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/Cart/address'); ?>",
            data: "a_name="+a_name+"&a_tel="+a_tel+"&a_address="+a_address,
            success: function(msg){
//
                if(msg){
//                    alert(msg);
                    $('.a').html(a_name);
                    $('.c').html(a_address);
                    $('.b').html(a_tel);
                    $('.address').val(msg);
                    $('.add').html('已保存成功')
                    alert(msg);
                }
//                if(msg==333){
//                    alert('库存不足');
//                }
            }
        });

    })
</script>