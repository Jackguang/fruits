<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:84:"E:\phpStudy\WWW\frit\fruits\public/../application/index\view\hard\reply_details.html";i:1492225574;s:72:"E:\phpStudy\WWW\frit\fruits\public/../application/index\view\layout.html";i:1492483054;s:23:"./index/layout/top.html";i:1492403485;s:24:"./index/layout/left.html";i:1492607197;s:26:"./index/layout/footer.html";i:1492173983;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>后台管理</title>
		<base href="__PUBLIC__">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="index/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="index/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="index/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->
		<!-- ace styles -->

		<link rel="stylesheet" href="index/assets/css/ace.min.css" />
		<link rel="stylesheet" href="index/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="index/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="index/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="index/assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="index/assets/js/html5shiv.js"></script>
		<script src="index/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

	
	<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
							后台管理
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
	

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="index/assets/avatars/a.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php
										use think\Session;
										$name = Session::get('name');
										echo $name;
									?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li> -->

								<li class="divider"></li>

								<li>
									<a href="<?php echo url('index/Login/loginout'); ?>">
										<i class="icon-off"></i>
										退出
										
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>
<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="active">
							<a href="<?php echo url('index/index/show'); ?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 后台控制台 </span>
							</a>
						</li>

						<li>
							<a href="" class="dropdown-toggle">
								<i class="icon-desktop"></i>
								<span class="menu-text">水果管理</span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('index/Goods/lists'); ?>">
										<i class="icon-double-angle-right"></i>
										水果列表
									</a>
								</li>

								<li>
									<a href="<?php echo url('index/Goods/index'); ?>">
										<i class="icon-double-angle-right"></i>
										添加水果
									</a>
								</li>

								

<!-- 								<li>
									<a href="#" class="dropdown-toggle">
										<i class="icon-double-angle-right"></i>

										账号设置
										<b class="arrow icon-angle-down"></b>
									</a>

									<ul class="submenu">
										<li>
											<a href="account.html">
												<i class="icon-leaf"></i>
												账号记录
											</a>
										</li>

										<li>
											<a href="addaccount.html">
												<i class="icon-leaf"></i>
												添加账号
											</a>
										</li>

									</ul>
								</li> -->
							</ul>
						</li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 活动管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="form-elements.html">
										<i class="icon-double-angle-right"></i>
										发布公告
									</a>
								</li>

								<li>
									<a href="form-wizard.html">
										<i class="icon-double-angle-right"></i>
										进入论坛
									</a>
								</li>

							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 用户管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('index/User/show'); ?>">
										<i class="icon-double-angle-right"></i>
										查看所有用户
									</a>
								</li>								
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 意见管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>
							<ul class="submenu">
								<!-- <li>
									<a href="form-elements.html">
										<i class="icon-double-angle-right"></i>
										发布公告
									</a>
								</li>

								<li>
									<a href="form-wizard.html">
										<i class="icon-double-angle-right"></i>
										进入论坛
									</a>
								</li> -->
								<li>
								<a href="<?php echo url('index/hard/opinoin_list'); ?>">

									<i class="icon-double-angle-right"></i>
									意见列表

								</a>
								</li>
								<li>
								<a href="<?php echo url('index/hard/reply_list'); ?>">

									<i class="icon-double-angle-right"></i>
									查看回复

								</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> 订单管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo url('index/Order/show'); ?>">
										<i class="icon-double-angle-right"></i>
										订单列表</a>

<<<<<<< HEAD
	<!-- 							<li>
=======

									<a href="<?php echo url('index/Order/show'); ?>">
										<i class="icon-double-angle-right"></i>
										订单列表
										</a>

									<a href="<?php echo url('index/Order/show'); ?>">
										<i class="icon-double-angle-right"></i>
<<<<<<< HEAD
										订单列表</a><!--<a href="<?php echo url('index/hard/lists'); ?>">-->

=======
										订单列表</a>
									<!--<a href="<?php echo url('index/hard/lists'); ?>">-->
>>>>>>> b6d91dc39b5982c40d0fc794462a56c0cfe2d47d
									</a>
								</li>
								<li>
>>>>>>> 0140b49e2c1e68a59d6d47580c42ac923838d086
									<a href="form-wizard.html">
										<i class="icon-double-angle-right"></i>
										进入论坛
									</a>
								</li>
<<<<<<< HEAD
 -->
=======
<<<<<<< HEAD


									<a href="<?php echo url('index/Order/show'); ?>">
										<i class="icon-double-angle-right"></i>
										订单列表</a>								

=======
>>>>>>> 0140b49e2c1e68a59d6d47580c42ac923838d086

>>>>>>> b6d91dc39b5982c40d0fc794462a56c0cfe2d47d

							</ul>
						</li>

					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

 
<?php if(!empty($panduan)){ ?>


<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>
        <!--<form action="<?php echo url('index/hard/show'); ?>" method="post">-->
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">管理员回复</a>
            </li>
            <li class="active">回复列表</li>
            <li class="active" style="color: grey">回复详情</li>
        </ul><!-- .breadcrumb -->
    </div>
    <h2 style="margin-left: 50px;">回复内容:</h2>
    <div style="width: 500px;height: 500px; margin-left: 150px; float: left">
        <font style="font-size: 20px;">
            <br><br>
            <?php echo str_repeat('&nbsp;','10');?><?php echo $arr['reply_content']; ?>
        </font>
    </div>
    <div style="margin-left: 150px; width: 500px;height: 50px;">
        <div style="margin-left: 250px;">
            <font style="font-size: 18px;">反馈时间：<?php echo date("y-m-d H:i:s",$arr['reply_time']); ?>
                <br>
                反馈人：<?php echo $arr['a_name']; ?></font></div>
    </div>





    <?php } else{ ?>






    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <!--<form action="<?php echo url('index/hard/show'); ?>" method="post">-->
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">用户意见</a>
                </li>
                <li class="active">意见列表</li>
                <li class="active" style="color: grey">意见详情</li>
            </ul><!-- .breadcrumb -->
        </div>
        <h2 style="margin-left: 50px;">意见内容:</h2>
        <div style="width: 500px;height: 500px; margin-left: 150px; float: left">
            <font style="font-size: 20px;">
                <br><br>
                <?php echo str_repeat('&nbsp;','10');?>111<?php echo $arr['opinion_content']; ?>
            </font>
        </div>
        <div style="margin-left: 150px; width: 500px;height: 50px;">
            <div style="margin-left: 250px;">
                <font style="font-size: 18px;">反馈时间：<?php echo date("y-m-d H:i:s",$arr['opinion_time']); ?>
                    <br>
                    反馈人：<?php echo $arr['u_name']; ?></font></div>
        </div>












        <?php } ?>

<!-- PAGE CONTENT ENDS -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

		
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="index/assets/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='index/assets/js/jquery-2.0.3.min.js'>"+"<"+"script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='index/assets/js/jquery-1.10.2.min.js'>"+"<"+"script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='index/assets/js/jquery.mobile.custom.min.js'>"+"<"+"script>");
		</script>
		<script src="index/assets/js/bootstrap.min.js"></script>
		<script src="index/assets/js/typeahead-bs2.min.js"></script>
		<script type="text/javascript" src="index/assets/js/datetime.js"></script>
		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="index/assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="index/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="index/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="index/assets/js/jquery.slimscroll.min.js"></script>
		<script src="index/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="index/assets/js/jquery.sparkline.min.js"></script>
		<script src="index/assets/js/flot/jquery.flot.min.js"></script>
		<script src="index/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="index/assets/js/flot/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->

		<script src="index/assets/js/ace-elements.min.js"></script>
		<script src="index/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				});
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) 
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
</body>
</html>

	
