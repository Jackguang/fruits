<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"E:\study\HHH\liupeng\fruits\fruits\public/../application/home\view\fruits\classify.html";i:1493002263;}*/ ?>
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
        body{ background:#eeeeee;  font-family:"微软雅黑"； }
        input[type="text"],input[type="password"],input[type="date"],input[type="month"],input[type="month"],input[type="time"],input[type="week"],input[type="email"],select{border:none; outline:none; transition:border 0.2s ease-in 0s;  }
        input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}		input[type="text"]:focus,input[type="password"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="email"]:focus,select:focus{border:1px solid #17a862;  }
        -->
    </style>
</head>
<body >
<div class="toper navbar-fixed-top">
    <div class="row color_white " >
        <div class="col-xs-2" style="padding-left:25px;"><a class="cwhite" href="<?php echo url('index.php/home/fruits/index'); ?>"><i class="icon-angle-left font32"></i></a></div>
        <div class="col-xs-8 text-center font20" ><?php echo $arr[0]['t_name']?></div>
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
<div class="height20"></div>
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

                        <!--<?php if(!$uid): ?>-->
                      <!--请先登录-->
                        <!--&lt;!&ndash;<div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="<?php echo $uid; ?>" alt="<?php echo $v['f_id']; ?>"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div>&ndash;&gt;-->

                        <!--<?php else: ?>-->
                        <!--<div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="<?php echo $uid; ?>" alt="<?php echo $v['f_id']; ?>"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div>-->

                        <!--<?php endif; ?>-->


                        <div class="text-center"><a href="javascript:void(0)" data-toggle="modal" data-target="#shopcar" class="gou" uid="<?php echo $uid; ?>" alt="<?php echo $v['f_id']; ?>"><i class="icon-shopping-cart font16 color_green"></i> 加入购物车</a></div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <input type="hidden" value="<?php echo $a; ?>" class="p" >
        <?php if(!$uid): else: ?>
        <input type="hidden" value="<?php echo $uid; ?>" class="uid" >
        <?php endif; ?>
        <input type="hidden" class="tid" value="<?php echo $arr[0]['t_id']?>">
    </div>
    <button type="button" class="btn btn-default btn-group-justified" id="jia">加载更多 <i class="icon-double-angle-down"></i></button>
    <div class="height20"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="shopcar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title font16" id="myModalLabel">我的购物车</h5>
            </div>
            <div class="modal-body aligncenter">
                <div class="photo_60"><img src="home/images/icon_shopcar_ok.png"></div><br>
                您选购的商品已加入购物车<br>
                购物车有2件商品，共计<span class="font16 color_orange">¥ 12</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-success">去结算</button>
            </div>
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
        var tid=$('.tid').val();

        var str='';
        var a=parseInt(p)+1;
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/fruits/jiaf'); ?>",
            data: "p="+p+"&tid="+tid,
            dataType:'json',
            success: function(msg){
//                alert(msg);
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