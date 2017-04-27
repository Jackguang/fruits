<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"E:\study\HHH\liupeng\fruits\fruits\public/../application/home\view\reply\order_list.html";i:1493255652;}*/ ?>
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
        body{ background:#eeeeee;  font-family:"微软雅黑";}
        input[type="text"],input[type="password"],input[type="date"],input[type="month"],input[type="month"],input[type="time"],input[type="week"],input[type="email"],select{border:none; outline:none; transition:border 0.2s ease-in 0s;  }
        input[type="button"],input[type="submit"]{outline:none;cursor:pointer;border:none;}		input[type="text"]:focus,input[type="password"]:focus,input[type="date"]:focus,input[type="month"]:focus,input[type="month"]:focus,input[type="time"]:focus,input[type="week"]:focus,input[type="email"]:focus,select:focus{border:1px solid #17a862;  }
        -->
    </style>
</head>
<body >

<div class="toper navbar-fixed-top">
    <div class="row color_white " >
        <div class="col-xs-2" style="padding-left:25px;"><i class="icon-angle-left font32" onclick="javascript:window.history.back();"></i></div>
        <font color="#663399" size="5px;">您未评价的商品</font>
        <div class="col-xs-2" >
            <div class="icon_shopcar">

            </div>
        </div>
    </div>
</div><!-- toper -->
<div class="height53"></div>
<div class="height20"></div>
<div class=" container-fluid">
    <div class="row">
        <?php if($arr['isset'] == 1): ?>
        <div class="table">
            <?php foreach($arr as $k=>$v) { ?>
            <div style="padding-right:5px;" >
                <div class="thumbnail" style="padding:0px;">
                    <a href="<?php echo url('home/Fruits/info'); ?>?id=<?php echo $v['f_id']; ?>"><div class="sosophoto"><img src="<?php echo $v['f_img']; ?>" width="160" height="120"></div></a>
                    <div class="caption">
                        <h4>订单号:<?php echo $v['o_number']; ?></h4>
                        <span class="color_gray"><?php echo $v['f_name']; ?></span>
                        <p class="color_gray"><span class="font16 color_orange">¥ <?php echo $v['m_price']; ?></span>/斤* <span class="font16 color_orange"><?php echo $v['o_num']; ?>个</span>(已收货)<span class="font16 color_orange" style="float: right;">
                            <button type="button" class="button" f_id="<?php echo $v['f_id']; ?>" o_number="<?php echo $v['o_number']; ?>" o_id="<?php echo $v['o_id']; ?>">评价</button>
                            <!--<a href="<?php echo url('home/reply/reply_add'); ?>?id=<?php echo $v['f_id']; ?>&o_number=<?php echo $v['o_number']; ?>">评价</a>-->
                        </span></p>
                        <div class="text-center" id="text_<?php echo $v['f_id']; ?>">
                            <!--<textarea style="background: sandybrown" cols="30px;" rows="5px;"></textarea><button type="submit" style="width: 60px; height: 30px;">提交</button>-->
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php else: ?>
        <center><img src="uploads/620.jpg" alt="">
            <br>
            <a href="<?php echo url('home/fruits/index'); ?>"><span style="font-size: 25px;">去商城买点水果吧→</span></a></center>

        <?php endif; ?>

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
    $(document).on('click','.button',function(){
        var  f_id= $(this).attr('f_id');
        var  o_number= $(this).attr('o_number');
        var  o_id= $(this).attr('o_id');
        var  html='';
        html="<form><textarea class='text' style=\"background: sandybrown\" cols=\"30px;\" rows=\"5px;\"></textarea><button type=\"button\" class='submit' style=\"width: 60px; height: 30px;\">提交</button></form>";
        $('#text_'+f_id).html(html);
    });
    $(document).on('click','.submit',function() {
        var  f_id= $('.button').attr('f_id');
        var  o_number= $('.button').attr('o_number');
        var  o_id= $('.button').attr('o_id');
        var cont=$('.text').val();
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/reply/reply_add'); ?>",
            data: "f_id=" + f_id + "&o_number=" + o_number+"&o_id="+o_id+"&opinion_content="+cont,
            success: function (msg) {
            alert(msg);
            }
        });
    });

</script>