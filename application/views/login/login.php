<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?php echo HOST_DOMAIN;?></title>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN;?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN;?>/css/color.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN;?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN;?>/js/jquery.funnyText.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
	<style>

		.login_con h1{
			display:block;
			text-align:center;
			color: #008448;
			font-size: 2em;
		}
		/*.login_con h1 span {
			background-color: #DFE2DB;

		}
		.login_con h1 span.active {
			background-color: #3B3738;
		}*/

		.charWrap {
		    display:inline-block;
		    position:relative;
		    overflow: hidden;
		}
		.funnyText span.left, 
		.funnyText span.right,
		.funnyText span.top,
		.funnyText span.bottom {
		    position:absolute;
		}
		.funnyText .charWrap {
		    transition: all 0.4s ease-in-out;
		    -webkit-transition: all 0.4s ease-in-out;/** Chrome & Safari **/
		    -moz-transition: all 0.4s ease-in-out;/** Firefox **/
		    -o-transition: all 0.4s ease-in-out;/** Opera **/
		}
		.funnyText .charWrap .top {
		    top:0;
		}
		.funnyText .charWrap .left {
		    left:0;
		}
		.funnyText .charWrap .right {
		    right:0;
		}
		.funnyText .charWrap .bottom {
		    bottom:0;
		}
		.funnyText .character {
		    overflow:hidden;
		    display:inline-block;
		}

		.login_con{
			vertical-align: middle;
		}
	</style>
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('.login_con h1').funnyText({
				speed: 700,
				activeColor: '#fff',
				color: '#008448',
				fontSize: '1.5em'
			});
		});
	</script>
</head>
<body class="login">
	<div class="login_con">
		<h1><?php echo HOST_DOMAIN;?></h1>
		<form name="loginform" id="loginform" method="post" onsubmit="return kc_login_form(this, 2);">
			<div class="login_input">
				<p>
					<bookmark-label for='user_login'>用户名：<input class="input" type="text" name='login' size='20' 	oninput="$('.login_error').remove();" onpropertychange="$('.login_error').remove();"></input></bookmark-label>
				</p>
				<p>
					<bookmark-label for='user_pass'>密码 ：<input class="input" type="password" name="pwd" size='20' 	oninput="$('.pwd_error').remove();" onpropertychange="$('.pass_error').remove();"></input></bookmark-label>
				</p>
				<p>
					<input class="submit" type="submit" name="submit" value="登录">
					<input type="hidden" name="redirect_to" value="http://www.<?php echo HOST_DOMAIN;?>">
					<input type="hidden" name="textcookie" value="1">
				</p>
			</div>
		</form>
	</div>
	<?php $this->load->view('footer')?>
</body>
</html>