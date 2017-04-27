<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\fruits\info.html";i:1493280329;}*/ ?>
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

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="home/css/swiper.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv_min.js"></script>
    <script src="js/respond_min.js"></script>
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
        <div class="col-xs-2" style="padding-left:25px;"><a class="cwhite" href="<?php echo url('home/Fruits/index'); ?>"><i class="icon-angle-left font32"></i></a></div>
        <div class="col-xs-8 text-center font20">商品详情</div>
        <div class="col-xs-2" >
            <div class="icon_shopcar">
                <div class="icon_shopcar_ts"></div>
                <?php if(!$uid): ?>


                <a class="cwhite" href="<?php echo url('home/user/login'); ?>"><div class="photo_30"><img src="home/images/icon_shopcar.png" alt="购物车"></div></a>

                <?php else: ?>
                <a class="cwhite" href="<?php echo url('home/Cart/index'); ?>"><div class="photo_30"><img src="home/images/icon_shopcar.png" alt="购物车"></div></a>

                <?php endif; ?>

            </div>
        </div>
    </div>
</div><!-- toper -->
<div class="height53"></div>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="productphoto"><img src="<?= $fruit_one[0]['f_img']?>"></div>
        </div>
        <!-- <div class="swiper-slide">
            <div class="productphoto"><img src="images/jdt2.jpg"></div>
        </div>
        <div class="swiper-slide">
            <div class="productphoto"><img src="images/jdt3.jpg"></div>
        </div> -->
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>
<!-- Swiper JS -->
<script src="home/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true
    });
</script><!-- 焦点图 -->
<div class=" width100 bg_white" style="padding:10px;">
    <h4><?= $fruit_one[0]['f_name']?></h4>
        <span class="pull-right">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default"><i class="icon-plus"></i></button>
                <button type="button" class="btn btn-default disabled">5</button>
                <button type="button" class="btn btn-default">
                    <i class="icon-minus"></i></button>
            </div>
        </span>
    <p class=" color_gray font16"><span class="color_orange font20">¥<?= $fruit_one[0]['m_price']?></span>&nbsp;&nbsp;&nbsp;&nbsp;<del>¥<?= $fruit_one[0]['m_price']?></del></p>
    <div class="height10"></div>
    <div class=" width100 bg_white border_top hang32">
        <span class=" font16">商品规格</span>
        <span class="pull-right"><?= $fruit_one[0]['f_weight']?></span>
    </div>
    <div class="height10"></div>
</div><!--a-->
<div class="height10"></div>
<div class=" width100 bg_white border_bottom" style="padding:10px;">
    <span class=" font16">商品介绍</span>
    <span class="pull-right"><a title="收起" class=" cgreen" href="#"><i class="icon-angle-up" style="font-size:24px;"></i></a></span>
</div>
<div class=" width100 bg_white" style="padding:10px;">
    <div class="artic14">
        <p><?= $fruit_one[0]['f_desc']?></p>
    </div>
</div><!--a-->
<div class="height10"></div>
<div class=" width100 bg_white border_bottom" style="padding:10px;">
    <span class=" font16">商品评价 (<?= $count?>)</span>
        <span class="pull-right color_orange">
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star-empty"></i>

        &nbsp;&nbsp;
        <a title="收起" class=" cgreen" href="#"><i class="icon-angle-up" style="font-size:24px;"></i></a>
        </span>
</div>
<?php if($ci != 0): if(is_array($arr) || $arr instanceof \think\Collection): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
<div class=" width100 bg_white" style="padding:10px;">
    <input type="hidden" class="fid" value="<?php echo $v['f_id']?>">
    <span><?= $v['u_tel']?></span>
        <span class="pull-right color_orange">

            <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star-empty"></i>
        </span>
    <div class="height10"></div>
    <div class="artic14">
        <p><?= $v['opinion_content']?></p>
    </div>
    <span class="pull-right">
        <?= date('Y-m-d h:i:s',$v['opinion_time']);?>
    </span><!--b-->
    <div class="height10 border_bottom"></div>
    <div class="height10"></div>
</div><!--a-->
<?php endforeach; endif; else: echo "" ;endif; else: ?>
<center><img src="uploads/620.jpg" alt=""></center>
<?php endif; ?>



<div class="height10"></div>
<!--    <div class=" width100 bg_white" style="padding:10px;">
       <div class="media">
           <div class="media-left">
             <a href="#"><div class="photo_80"><img src="images/pic3.jpg" class="img-rounded" ></div></a>
           </div>
           <div class="media-body">
             <h4 class="media-heading">圆心蔬菜小铺</h4>
             <p class=" color_gray font16">专业的蔬菜贩售<span class="pull-right"><button class="btn btn-default" type="submit" style=" border:2px solid #17a862;"><span class="color_green">进店逛逛</span></button></span></p>
           </div>
       </div>
   </div><!--a-->
<div class="height20"></div>
<div class="height60"></div>

<div class=" width100 bg_white navbar-fixed-bottom" style="padding:10px;">
    <div class="row" style="width:100%; margin:0 auto;">
        <div class="col-xs-6" style="padding-right:5px; padding-left:0px;"  >
            <a href="https://www.sobot.com/chat/h5/index.html?sysNum=0143f5d03e6149fd9434921fecc76b86&source=1"> <button class="btn btn-lg btn-success btn-group-justified"   >联系客服</button></a>
        </div>
        <div class="col-xs-6" style="padding-left:5px; padding-right:0px;">


           <?php if(!$uid): ?>
            <a href="<?php echo url('home/user/login'); ?>" class="btn btn-lg btn-success btn-group-justified">加入购物车</a>

            <?php else: ?>
            <input type="hidden" class="uid" value="<?php echo $uid; ?>">
            <button class="btn btn-lg btn-success btn-group-justified" id="che" alt="">加入购物车</button>


            <?php endif; ?>


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
    //加入购物车
    $('#che').click(function(){

        var uid=$('.uid').val();
        if(!uid){
            window.location.href="<?php echo url('index.php/home/User/login'); ?>";
        }
        var fid=$('.fid').val();
        var num = $(".disabled").html();
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/fruits/cartdesc'); ?>",
            data: "fid="+fid+"&uid="+uid+"&num="+num,
            success: function(msg){
//                alert(msg);
                if(msg==222){
                    alert('加入购物车成功');
                }
                if(msg==333){
                    alert('库存不足');
                }
            }
        });


    })
    $(".icon-minus").click(function(){
        var num = $(".disabled").html();
        nums=parseInt(num)-1;
        if(nums <= 0){
            return false;
        }else{
            $(".disabled").html(nums);
        }
    })

    $(".icon-plus").click(function(){
        var fid=$('.fid').val();
        var num = $(".disabled").html();
        var nums=parseInt(num)+1;
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/fruits/ku'); ?>",
            data: "num="+num+"&fid="+fid,
            dataType:'json',
            success: function(msg){
                if(msg==2){
                    $(".disabled").html(nums);
                }else {
                    alert('库存没有更多了');

                }
            }
        });

    })


</script>