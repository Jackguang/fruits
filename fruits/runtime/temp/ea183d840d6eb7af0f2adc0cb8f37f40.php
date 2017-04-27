<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"F:\soft\phpStudy\WWW\github\fruits\fruits\public/../application/home\view\cart\index.html";i:1493016413;}*/ ?>
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
    <?php if(is_array($data) || $data instanceof \think\Collection): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
    <section class="shopcar" alt="<?php echo $v['f_id']; ?>">
        <div class="shopcar-checkbox">
            <label for="shopcar" onselectstart="return false"  alt="<?php echo $v['f_id']; ?>" alp="<?php echo $v['m_price']; ?>" name="box" ></label>
            <input type="checkbox" alt="<?php echo $v['f_id']; ?>" class="shopcar"/>
        </div>
        <figure><img src="<?php echo $v['f_img']; ?>"/></figure>
        <dl>
            <dt><?php echo $v['f_name']; ?></dt>
            <dd><?php echo $v['f_weight']; ?></dd>
            <!--<dd>尺寸：L</dd>-->
            <div class="add" >
                <span class="jian" alt="<?php echo $v['m_price']; ?>">-</span>
                <input type="text" value="<?php echo $v['f_num']; ?>"  class="n<?php echo $v['f_id']; ?>" name="num"/>
                <span class="jia" alt="<?php echo $v['m_price']; ?>">+</span>
            </div>
            <h3>￥<?php echo $v['m_price']; ?></h3>

            <small class="del" alt="<?php echo $v['f_id']; ?>" ma="<?php echo $v['m_price']; ?>"><img src="car/images/shopcar-icon01.png"/></small>
        </dl>
    </section>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <!--去结算-->
    <div style="margin-bottom: 16%;"></div>
    <input type="hidden" value="<?php echo $data[0]['u_id']?>" class="uid">
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
        <b id="allprice">0.00</b>
        <span><a href="javascript:void (0)" class="buy">去结算（0）</a></span>
    </div>
    <ul>
        <li>
            <a href="<?php echo url('home/Fruits/index'); ?>">
                <img src="car/images/footer001.png"/>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="<?php echo url('home/Fruits/classifyin'); ?>">

            <img src="car/images/footer002.png"/>
                <p>分类</p>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo url('home/Cart/index'); ?>">
                <img src="car/images/footer03.png"/>
                <p>购物车</p>
            </a>
        </li>
        <li>
            <a href="<?php echo url('home/userinfo/user'); ?>">
                <img src="car/images/footer004.png"/>
                <p>个人中心</p>
            </a>
        </li>
    </ul>
</footer>


</body>
</html>
<script src="js/jq.js"></script>
<script>
    //去结算
    $('.buy').click(function(){
        var str='';
        var price='';
        var a='';
        var num='';
        var box=document.getElementsByName('box');
        var _this=$(this);
        var allprice = $('#allprice').html();//总价

//        console.log(box);
        $('.shopcar-checkd').each(function(){
                str +=','+$(this).attr('alt');//商品id
                price +=','+$(this).attr('alp');//商品单价
                a=$(this).attr('alt');//商品数量
                num +=','+$('.n'+a).val();
//                alert(1111);

        })

        str=str.substr(1);
        price=price.substr(1);
        num=num.substr(1);
//            alert(str);
//            alert(price);
//            alert(num);
//            alert(allprice);
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/Cart/ruku'); ?>",
            data: "num="+num+"&str="+str+"&price="+price+"&allprice="+allprice,
            success: function(msg){

            if(msg==333){
                //调到订单页
                window.location.href="<?php echo url('home/cart/buy'); ?>";

            }else{
                alert(msg);
            }
            }
        });


    });

    //删除数据
    $('.del').click(function(){
        var fid=$(this).attr('alt');
        var ma=$(this).attr('ma');//单价
        var num=$(this).prev().prev().children("input:text[name='num']").val();//个数

        var newprice = parseInt(ma)*parseInt(num);  //销毁价
        var nowp = $("#allprice").html();
        var all = $("#allprice");
        var sumprice=parseInt(nowp)-parseInt(newprice);
//        alert(sumprice);

        var uid=$('.uid').val();
        var _this=$(this);
        $.ajax({
            type: "POST",
            url: "<?php echo url('index.php/home/Cart/del'); ?>",
            data: "uid="+uid+"&fid="+fid,
            dataType:'json',
            success: function(msg){
//                alert(msg);
                if(msg==333){
                    //选中减钱
                    if(_this.parent().prev().prev().children("label:first-child").hasClass('shopcar-checkd')){
                        all.html(sumprice);
                        //选中删除
                        _this.parent().parent().remove();
                    }else{
                        //未选中，直接删除
                        _this.parent().parent().remove();
                    }


                }

            }
        });
    })
    //减少数据
    $('.jian').click(function(){
        if($(this).parent().parent().prev().prev().children("label:first-child").hasClass('shopcar-checkd'))
        {
            var num=$(this).next().val();
            var a=parseInt(num)-1;
            var uid=$('.uid').val();//用户id
            var fid=$(this).parent().parent().parent().attr('alt');
            var _this=$(this);

            if(a>0){
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('index.php/home/Cart/kushao'); ?>",
                    data: "num="+num+"&fid="+fid+"&uid="+uid,
                    success: function(msg){
                        if(msg==2){
                            _this.next().val(a);
                            var allprice = $('#allprice').html();
                            var oprice = _this.attr('alt');
                            var newprice = parseInt(allprice)-parseInt(oprice);
                            $('#allprice').html(newprice)
                        }
                    }
                });

            }else {
                return false;
                _this.next().val(num);

                alert('不能再少了')
            }
        }else{
            var num=$(this).next().val();
            var a=parseInt(num)-1;
            var uid=$('.uid').val();//用户id
            var fid=$(this).parent().parent().parent().attr('alt');
            var _this=$(this);

            if(a>0){
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('index.php/home/Cart/kushao'); ?>",
                    data: "num="+num+"&fid="+fid+"&uid="+uid,
                    success: function(msg){
                        if(msg==2){
                            _this.next().val(a);
//                            var allprice = $('#allprice').html();
//                            var oprice = _this.attr('alt');
//                            var newprice = parseInt(allprice)-parseInt(oprice);
//                            $('#allprice').html(newprice)
                        }
                    }
                });

            }else {
                return false;
                _this.next().val(num);

                alert('不能再少了')
            }
        }

    })

    $('.jia').click(function(){
        if($(this).parent().parent().prev().prev().children("label:first-child").hasClass('shopcar-checkd'))
        {
            var num=$(this).prev().val();
            var uid=$('.uid').val();//用户id

            var _this=$(this);
            var allprice = $('#allprice').html();
            var oprice = $(this).attr('alt');
            var newprice = parseInt(allprice)+parseInt(oprice);
            $('#allprice').html(newprice)

            var fid=$(this).parent().parent().parent().attr('alt');
            var a=parseInt(num)+1;
//        alert(a);
            $.ajax({
                type: "POST",
                url: "<?php echo url('index.php/home/Cart/ku'); ?>",
                data: "num="+num+"&fid="+fid+"&uid="+uid,
                dataType:'json',
                success: function(msg){
                    if(msg==2){

                        _this.prev().val(a);
                    }else {
                        alert('库存没有更多了');

                    }
                }
            });}else{
            var num=$(this).prev().val();
            var uid=$('.uid').val();//用户id

            var _this=$(this);
//            var allprice = $('#allprice').html();
//            var oprice = $(this).attr('alt');
//            var newprice = parseInt(allprice)+parseInt(oprice);
//            $('#allprice').html(newprice)

            var fid=$(this).parent().parent().parent().attr('alt');
            var a=parseInt(num)+1;
//        alert(a);
            $.ajax({
                type: "POST",
                url: "<?php echo url('index.php/home/Cart/ku'); ?>",
                data: "num="+num+"&fid="+fid+"&uid="+uid,
                dataType:'json',
                success: function(msg){
                    if(msg==2){

                        _this.prev().val(a);
                    }else {
                        alert('库存没有更多了');

                    }
                }
            });

        }
    })


</script>
