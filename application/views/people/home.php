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
	<script type="text/javascript">
		$(function(){
			$('.user_face').hover(function(){
				$(".kc-face-edit-button").show();
			}, function(){
				$(".kc-face-edit-button").hide();
			})
		})
	</script>
</head>
</head>
<body class="kc">
	<?php $this->load->view('header')?>
	<div class="people_content">
		<div class="people_inner">
			<div class="pepole_wrap people_head">
			<?php var_dump($user_info)?>
			</div>
		</div>
		<?php $this->load->view('/people/inner_right')?>
	</div>
	<?php $this->load->view('footer')?>
</body>