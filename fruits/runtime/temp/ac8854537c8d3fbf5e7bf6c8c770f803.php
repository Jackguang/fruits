<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\cart\logistics.html";i:1493203785;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="__PUBLIC__">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>物流</title>
    <link rel="stylesheet" type="text/css" href="home/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="home/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="home/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="home/css/style.css"/>
    <script src="home/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
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
        <img src="home/images/left.png"/>
    </a>
    <h3>物流信息</h3>

    <a class="iconb" href="shopcar.html">
    </a>
</header>

<div class="contaniner fixed-cont fixed-cont1">
    <section class="go-order">
<?php foreach ($list as $k=>$v ) {?>
        <div class="order-shop">
            <dl>
                <a href="detail.html">
                    <dt><img src="<?php echo $v['f_img']; ?>"/></dt>
                    <dd>
                        <p><?php echo $v['f_name']; ?>:<?php echo $v['f_title']; ?></p>
                        <!--<small>颜色：经典绮丽款</small>-->
                        <span>规格:<?php echo $v['f_weight']; ?></span>
                        <b>￥<?php echo $v['m_price']; ?>.00</b>
                        <strong>×<?php echo $num[$k]?></strong>
                    </dd>
                </a>

            </dl>
            <?php }?>
            <!--<dl>-->
                <!--<a href="detail.html">-->
                    <!--<dt><img src="home/images/index-ph01.png"/></dt>-->
                    <!--<dd>-->
                        <!--<p>超级大品牌服装，现在够买只要998</p>-->
                        <!--<small>颜色：经典绮丽款</small>-->
                        <!--<span>尺寸：L</span>-->
                        <!--<b>￥32.00</b>-->
                        <!--<strong>×3</strong>-->
                    <!--</dd>-->
                <!--</a>-->

            <!--</dl>-->
            <ul>

                <li>
                    <span>商品总额</span>
                    <small>￥<?php echo $data['all_price']; ?>.00</small>
                </li>
                <li>
                    <p>
                        下单时间：<?php echo $data['o_time']; ?><br />订单编号：<?php echo $data['o_number']; ?>
   <div>
                    <div></div>
                    <div style="float:right" >
                        <?php if($data['o_state'] == 3): ?>
                        <input type="button" value="确认收货" class="order" style="background-color: orangered;width: 120px;height: 60px;" alt="<?php echo $data['o_id']; ?>"/>
                   <?php endif; ?>
                    </div>
                </div>

                    </p>

                </li>


            </ul>

        </div>

        <div class="wuliu clearfloat">
            <div class="list clearfloat">
                <div class="left">
                    <!--04-01-->
                </div>
                <div class="right clearfloat">
                    <ul>
                        <div  class="table">



                        <?php if($data['o_state'] == 1): ?>
                        <!--付款成功-->
                  <li class="clearfloat active">
                        <span class="dian"></span>
                        <div class="list-line clearfloat">
									<span class="zuo">
									<?php echo $data['o_time']; ?>
									</span>
									<span class="you">
										下单成功，待发货……
									</span>
                        </div>
                    </li>
                        <?php elseif($data['o_state'] == 2): ?>
                        <!--已发货-->
                        <li class="clearfloat active">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
									<?php echo $data['delivery_time']; ?>
									</span>
									<span class="you">
										已发货，敬请等待……
									</span>
                            </div>
                        </li>

                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
											<?php echo $data['o_time']; ?>
									</span>
									<span class="you">
											下单成功，待发货……
									</span>
                            </div>
                        </li>

                        <?php elseif($data['o_state'] == 3): ?>
                        <!--货已到，待收货-->
                        <li class="clearfloat active">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
									<?php echo $data['delivered_time']; ?>
									</span>
									<span class="you">
										货已到。待收货，马上就到小主手里……
									</span>
                            </div>
                        </li>
                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
											<?php echo $data['delivery_time']; ?>
									</span>
									<span class="you">
												已发货，敬请等待……
									</span>
                            </div>
                        </li>

                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
											<?php echo $data['o_time']; ?>
									</span>
									<span class="you">
											下单成功，待发货……
									</span>
                            </div>
                        </li>
                        <?php elseif($data['o_state'] == 4): ?>
                        <!--发送到，已收货-->
                        <li class="clearfloat active">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
									<?php echo $data['receiving_time']; ?>
									</span>
									<span class="you">
										已收货，祝小主开心每一天，欢迎下次光临……
									</span>
                            </div>
                        </li>
                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
									<?php echo $data['delivered_time']; ?>
									</span>
									<span class="you">
										货已到。待收货，马上就到小主手里……
									</span>
                            </div>
                        </li>
                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
											<?php echo $data['delivery_time']; ?>
									</span>
									<span class="you">
												已发货，敬请等待……
									</span>
                            </div>
                        </li>

                        <li class="clearfloat">
                            <span class="dian"></span>
                            <div class="list-line clearfloat">
									<span class="zuo">
											<?php echo $data['o_time']; ?>
									</span>
									<span class="you">
											下单成功，待发货……
									</span>
                            </div>
                        </li>
                        <?php elseif($data['o_state'] == 0): ?>
                        <!--未付款-->
                        <dd>
                            <input type="button" value="确认收货" class="order-que"/>
                            <input type="button" value="查看物流"  class="wu"  alt="<?php echo $va['o_id']; ?>"/>
                            <input type="button" value="取消订单" />
                        </dd>

                        <?php endif; ?>



                        <!--<li class="clearfloat">-->
                            <!--<span class="dian"></span>-->
                            <!--<div class="list-line clearfloat">-->
									<!--<span class="zuo">-->
										<!--09:53-->
									<!--</span>-->
									<!--<span class="you">-->
										<!--【合肥十六分部】的派件员【罗广龙】正在派件 电话:*-->
									<!--</span>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="clearfloat">-->
                            <!--<span class="dian"></span>-->
                            <!--<div class="list-line clearfloat">-->
									<!--<span class="zuo">-->
										<!--08:08-->
									<!--</span>-->
									<!--<span class="you">-->
										<!--快件已到达【合肥】 扫描员是【赵邦飞】上一站是【合肥分拨中心】-->
									<!--</span>-->
                            <!--</div>-->
                        <!--</li>-->
                        </div>
                    </ul>
                </div>
            </div>
            <!--<div class="list clearfloat">-->
                <!--<div class="left">-->
                    <!--03-31-->
                <!--</div>-->
                <!--<div class="right clearfloat">-->
                    <!--<ul>-->
                        <!--<li class="clearfloat">-->
                            <!--<span class="dian"></span>-->
                            <!--<div class="list-line clearfloat">-->
									<!--<span class="zuo">-->
										<!--15:16-->
									<!--</span>-->
									<!--<span class="you">-->
										<!--已签收,签收人是同事代签已签收-->
									<!--</span>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="clearfloat">-->
                            <!--<span class="dian"></span>-->
                            <!--<div class="list-line clearfloat">-->
									<!--<span class="zuo">-->
										<!--09:53-->
									<!--</span>-->
									<!--<span class="you">-->
										<!--【合肥十六分部】的派件员【罗广龙】正在派件 电话:*-->
									<!--</span>-->
                            <!--</div>-->
                        <!--</li>-->
                        <!--<li class="clearfloat">-->
                            <!--<span class="dian"></span>-->
                            <!--<div class="list-line clearfloat">-->
									<!--<span class="zuo">-->
										<!--08:08-->
									<!--</span>-->
									<!--<span class="you">-->
										<!--快件已到达【合肥】 扫描员是【赵邦飞】上一站是【合肥分拨中心】-->
									<!--</span>-->
                            <!--</div>-->
                        <!--</li>-->
                    <!--</ul>-->
                <!--</div>-->
            <!--</div>-->
        </div>
    </section>
</div>
</body>
</html>
<script src="js/jq.js"></script>
<script>
    $('.order').click(function(){
        //修改订单状态为收货状态
        var oid=$('.order').attr('alt');

        var str='';
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/Cart/orderstate'); ?>",
            data: "o_id="+oid,
            dataType:'json',
            success: function(msg){
//                alert(msg);
                if(msg.az==2){
                    $('.order').hide();
                    str+='<li class="clearfloat active"><span class="dian"></span><div class="list-line clearfloat"><span class="zuo">'+msg.data.receiving_time+'</span><span class="you">已收货，祝小主开心每一天，欢迎下次光临……</span></div></li><li class="clearfloat"><span class="dian"></span><div class="list-line clearfloat"><span class="zuo"> '+msg.data.delivered_time+'</span><span class="you">货已到。待收货，马上就到小主手里……</span></div></li>';
                    str+='<li class="clearfloat"><span class="dian"></span><div class="list-line clearfloat"><span class="zuo">'+msg.data.delivery_time+'</span><span class="you"> 已发货，敬请等待……</span></div></li><li class="clearfloat"> <span class="dian"></span><div class="list-line clearfloat"><span class="zuo"> '+msg.data.o_time+'</span><span class="you">下单成功，待发货……</span></div></li>';
                    $('.table').html(str);
                }
                if(msg.az==1){
                    alert('失败');
                }
            }
        });
    })
</script>