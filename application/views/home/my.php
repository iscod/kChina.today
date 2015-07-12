<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/global.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/home.css?var=<?php echo CSS_VERSION?>" type="text/css" media="all">
</head>
</head>
<body class="kc">
	<?php $this->load->view('header')?>
	<div class="home_content">
		<div class="home_inner">
			<div class="home_news home_wrap">
				<div class="home_wrap_head">
					<div class="user_nickname home_wrap_head_top"><?php if ($user_info['user_nickname']): echo $user_info['user_nickname']; else: echo $user_info['user_login']; endif;?></div>
					<div class="user_bio">，hello world</div>
				</div>
				<div class="home_wrap_content">
					<?php var_dump($user_info)?>
					<div class="user_description">这个世界就是罗生门，没有真相，只有立场。一切真相都是宣传，很多真理和真相的理解都是靠宣传才被人接受的。既然都是流氓，谁也别看不上谁。</div>
				</div>			
			</div>

			<div class="home_book home_wrap">
				<div class="home_wrap_head">
					<h2>读书</h2>
					<span class="home_wrap_ico"><a href="/book" title="更多..">.....</a></span>
				</div>
				<div class="home_wrap_content">
					<?php var_dump($user_info);?>
				</div>	
			</div>
			<div class="home_traver home_wrap">
				<div class="home_wrap_head">
					<h2>旅行</h2>
					<span class="home_wrap_ico"><a href="/traver" title="更多..">.....</a></span>
				</div>
				<div class="home_wrap_content">
					<?php var_dump($user_info);?>
					<?php var_dump($user_info);?>
					<?php var_dump($user_info);?>
				</div>	
			</div>
			<div class="home_shoot home_wrap">
				<div class="home_wrap_head">
					<h2>摄影</h2>
					<span class="home_wrap_ico"><a href="/shoot" title="更多..">.....</a></span>
				</div>
				<div class="home_wrap_content">
					<?php var_dump($user_info);?>
				</div>	
			</div>
		</div>
		<div class="home_inner_right">
			<div class="home_focus"><a href="home/focus_on">关注者<span clss="focus_num">5</span>人</a><a href="/be_focus">被关注<span clss="focus_num">10人</span></a></div>
			<div class="home_focus_book focus_inner">关注了<span class="focus_num">10</span>本书</div>
			<div class="home_focus_shoot focus_inner">关注了<span class="focus_num">10</span>摄像</div>
			<div class="focus_kc">
				<div onclick="focus_kc_weibo()">@kchina</div>
				<div onclick="focus_kc()">关注kc</div>
			</div>
		</div>

	</div>
	<?php $this->load->view('footer')?>
</body>