<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"F:\soft\phpStudy\WWW\github\fruits\fruits\public/../application/home\view\fruits\index.html";i:1493016413;}*/ ?>
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
    <script src="home/js/html5shiv_min.js"></script>
    <script src="home/js/respond_min.js"></script>
    <![endif]-->

    <style type="text/css">
        <!--
        body{ background:#ffffff;  font-family:"微软雅黑"; }
        -->
    </style>
</head>
<body >
<div class="toper navbar-fixed-top">
    <div class="row color_white " >
        <div class="col-xs-2">&nbsp;</div>
        <div class="col-xs-8 text-center font20">水果派对</div>
        <div class="col-xs-2" >
            <a href="javascript:void(0)" >
                <div class="photo_25" style="margin-top:3px;" id="chen">
            <img src="home/images/icon_soso.png" alt="搜索" class="sou">

        </div></a>

        </div>
    </div>
</div><!-- toper -->
<div class="height53"></div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="homephoto"><img src="home/images/jdt1.jpg"></div>
        </div>
        <div class="swiper-slide">
            <div class="homephoto"><img src="home/images/jdt2.jpg"></div>
        </div>
        <div class="swiper-slide">
            <div class="homephoto"><img src="home/images/jdt3.jpg"></div>
        </div>
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
<div class="height20"></div>
<div class=" container-fluid">
    <div class="row">
        <div class="col-xs-3 text-center" >
            <a class="cgray" href="<?php echo url('home/Fruits/classify'); ?>?t_id=1"><div class="photo_60"><img src="uploads/1.jpg"><br>进口专区</div></a>
        </div>
        <div class="col-xs-3  text-center">
            <a class="cgray" href="<?php echo url('home/Fruits/classify'); ?>?t_id=2"><div class="photo_60"><img src="uploads/3.jpg"><br>国产精品</div></a>
        </div>
        <div class="col-xs-3  text-center" >
            <a class="cgray" href="<?php echo url('home/Fruits/classify'); ?>?t_id=3"><div class="photo_60"><img src="home/images/pic_07.jpg"><br>休闲干果</div></a>
        </div>
        <div class="col-xs-3  text-center" >
            <a class="cgray" href="<?php echo url('home/Fruits/act'); ?>"><div class="photo_60"><img src="home/images/pic_09.jpg"><br>活动专区</div></a>
        </div>

        <!--<div class="col-xs-3  text-center">-->
            <!--<a class="cgray" href="list.html"><div class="photo_60"><img src="images/pic_16.jpg"><br>菜谱搭配</div></a>-->
        <!--</div>-->
        <!--<div class="col-xs-3  text-center" >-->
            <!--<a class="cgray" href="list.html"><div class="photo_60"><img src="images/pic_17.jpg"><br>农场采摘</div></a>-->
        <!--</div>-->
        <!--<div class="col-xs-3  text-center" >-->
            <!--<a class="cgray" href="list.html"><div class="photo_60"><img src="images/pic_18.jpg"><br>有机食物</div></a>-->
        <!--</div>-->
    </div>
    <div class="height53"></div>
    <div class=" container-fluid">
        <div class="row">
            <div class="table">
            <?php if(is_array($arr) || $arr instanceof \think\Collection): if( count($arr)==0 ) : echo "" ;else: foreach($arr as $key=>$v): ?>
                <div class="col-xs-6" style="padding-right:5px;" >
                    <div class="thumbnail" style="padding:0px;">
                        <a href="<?php echo url('home/Fruits/info'); ?>?id=<?php echo $v['f_id']; ?>"><div class="sosophoto"><img src="<?php echo $v['f_img']; ?>" width="160" height="120"></div></a>
                        <div class="caption">
                            <h4><?php echo $v['f_name']; ?></h4>
                            <span class="color_gray"><?php echo $v['f_title']; ?></span>
                            <p class="color_gray"><span class="font16 color_orange">¥ <?php echo $v['m_price']; ?></span>/斤</p>
                            <div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="<?php echo $uid; ?>" alt="<?php echo $v['f_id']; ?>"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
            <input type="hidden" value="<?php echo $a; ?>" class="p" >
            <input type="hidden" value="<?php echo $uid; ?>" class="uid" >
        </div>
        <button type="button" class="btn btn-default btn-group-justified" id="jia">加载更多 <i class="icon-double-angle-down"></i></button>
        <div class="height20"></div>
    </div>
    <div class="height20"></div>
    <a href="#"><div class="adphoto"><img src="home/images/ad1.jpg" class="img-rounded"></div></a>
    <div class="height20"></div>
    <a href="#"><div class="adphoto"><img src="home/images/jdt2.jpg" class="img-rounded"></div></a>
    <div class="height20"></div>
    <div class="height60"></div>
</div>
<div class="height20"></div>
<div class="footer navbar-fixed-bottom">
    <div class="row">
        <div class="col-xs-3 text-center" style=" padding-top:5px;">
            <a class="cgreen" href="<?php echo url('home/Fruits/index'); ?>"><div class="photo_30"><img src="home/images/nav11.png"><br>首页</div></a>
        </div>
        <div class="col-xs-3  text-center" style=" padding-top:5px;">
            <a class="cgray" href="<?php echo url('home/Fruits/classifyin'); ?>"><div class="photo_30"><img src="home/images/nav2.png"><br>分类</div></a>
        </div>
        <div class="col-xs-3  text-center" style=" padding-top:5px;">

           <?php if(!$uid): ?>
            <a class="cgray" href="<?php echo url('home/user/login'); ?>"><div class="photo_30"><img src="home/images/nav3.png"><br>购物车</div></a>

            <?php else: ?>
            <a class="cgray" href="<?php echo url('home/Cart/index'); ?>"><div class="photo_30"><img src="home/images/nav3.png"><br>购物车</div></a>

            <?php endif; ?>


            <a class="cgray" href="<?php echo url('home/Cart/index'); ?>"><div class="photo_30"><img src="home/images/nav3.png"><br>购物车</div></a>

        </div>
        <div class="col-xs-3  text-center" style="padding-top:5px;">
            <a class="cgray" href="<?php echo url('home/userinfo/user'); ?>"><div class="photo_30"><img src="home/images/nav4.png"><br>我的</div></a>
        </div>
    </div>
</div><!-- footer -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="home/js/jquery_min1_11_2.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="home/js/bootstrap.min.js"></script>
</body>
</html>
<script src="js/jq.js"></script>
<script>
    //搜索
    $('.sou').click(function(){
        var str=prompt("水果名称","");
        var uid=$('.uid').val();
        var chen='';

        if(str)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo url('index.php/home/Fruits/sou'); ?>",
                data: "str="+str,
                dataType:'json',
                success: function(msg){
//alert(msg);
                        $.each(msg, function(k, v){
                            chen+='<div class="col-xs-6" style="padding-right:5px;" ><div class="thumbnail" style="padding:0px;"><a href="<?php echo url('home/Fruits/info'); ?>?id='+v.f_id+'"><div class="sosophoto"><img src="'+v.f_img+'" width="160" height="120"></div></a><div class="caption">';
                             chen+='<h4>'+v.f_name+'</h4><span class="color_gray">'+v.f_title+'</span><p class="color_gray"><span class="font16 color_orange">¥ '+v.m_price+'</span>/斤</p><div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="'+uid+'" alt="'+v.f_id+'"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div></div></div></div>';
                        });
                    $(".table").html(chen);

                }
            });
        }
        <!--$('#chen').html(str);-->
    })
    //加购物车
    $(document).on('click','.gou',function(){

//        $(".gou").on("click", function(){
           var fid=$(this).attr('alt');//商品id
           var uid=$(this).attr('uid');//用户id
        if(!uid){
            window.location.href="<?php echo url('index.php/home/user/login'); ?>";
        }
            $.ajax({
                type: "POST",
                url: "<?php echo url('index.php/home/cart/cart'); ?>",
                data: "fid="+fid+"&uid="+uid,
                success: function(msg){
                if(msg==1){
                    alert('库存不足了');
                }else if(msg==111){
                    alert('加入购物车成功');
                }else if(msg==222){
                    alert('加入购物车成功');
                }
                }
            });


    })

    //加一页
    $("#jia").on("click", function(){
     var p=$('.p').val();
     var uid=$('.uid').val();
//        if(!uid){
//            window.location.href="<?php echo url('index.php/home/user/login'); ?>";
//        }
//alert(p);
     var str='';
     var a=parseInt(p)+1;
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/fruits/jia'); ?>",
            data: "p="+p,
            dataType:'json',
            success: function(msg){
                if(msg.sid==2){
                   $('#jia').html('加载到底了！');

                }else {
                    $.each( msg.resl, function(k, v){
                        str+='<div class="col-xs-6" style="padding-right:5px;" ><div class="thumbnail" style="padding:0px;"><a href="<?php echo url('home/Fruits/info'); ?>?id='+v.f_id+'"><div class="sosophoto"><img src="'+v.f_img+'" width="160" height="120"></div></a><div class="caption"><h4>'+v.f_name+'</h4><span class="color_gray">'+v.f_title+'</span>';
                        str+='<p class="color_gray"><span class="font16 color_orange">¥ '+v.m_price+'</span>/斤</p><div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="'+uid+'" alt="'+v.f_id+'"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div></div></div></div>';
                    });
                    $(".table").append(str);
                    $('.p').val(msg.pa);
                }
            }
        });
    })
</script>