<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"E:\WAPM\WWW\chenyan\11\fruits\fruits\public/../application/home\view\userinfo\addres.html";i:1493016793;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
         <meta name="format-detection" content="telephone=no" />
    <title>收获地址专区</title>
    <base href="__PUBLIC__">
    <link rel="stylesheet" type="text/css" href="home/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="home/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="home/css/base1.css"/>
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
		<h3>收获地址专区</h3>
			
			<a class="text-top" href="<?php echo url('home/Userinfo/goaddress'); ?>">
				添加
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<?php foreach($data as $k=>$v){?>
		<dl class="address">
			<!-- <a href="go-address.html"> -->
				<dt>
					<p><?= $v['a_name']?></p>
					<span><?= $v['a_tel']?></span>
						<?php if($v['a_state'] == '1'): ?>
							<small va="<?= $v['a_id']?>">默认</small>
						<?php else: ?>
							<small class="default" val="<?= $v['a_id']?>">			
							可设为默认</small>
						<?php endif; ?>
				</dt>
				<dd><?= $v['a_address']?></dd>
			<!-- </a> -->
		</dl>
		<?php }?>
	</div>
</body>
</html>
<script>
	$(".default").click(function(){
		var id = $(this).attr('val');
		// var ids = $(this).prev().attr('va');
		// alert(ids);
		var _this = $(this);
		$.ajax({
		   type: "POST",
		   url: "<?php echo url('home/Userinfo/upda'); ?>",
		   data: {id:id},
		    success: function(msg){
		    	if(msg == 1){
		    		_this.html('默认');
		    		// _this.prev().html('可设为默认');	
		    	}
		    }
		})
	})
</script>