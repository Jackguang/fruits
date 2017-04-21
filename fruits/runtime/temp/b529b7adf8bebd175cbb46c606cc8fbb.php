<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"E:\phpStudy\WWW\frit\fruits\public/../application/home\view\userinfo\addres.html";i:1492694905;}*/ ?>
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
			
			<a class="text-top" href="<?php echo url('home/userinfo/goaddress'); ?>">
				添加
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<?php foreach($data as $k=>$v){?>
		<dl class="address">
			<a href="go-address.html">
				<dt>
					<p><?= $v['a_name']?></p>
					<span><?= $v['a_tel']?></span>
						
						<?php if($v['a_state'] == '1'): ?>
					<small>默认</small>
						<?php else: ?> 
						<small> </small>
						<?php endif; ?>					
				</dt>
				<dd><?= $v['a_address']?></dd>
			</a>
		</dl>
		<?php }?>
	</div>

</body>
</html>