<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>注册-<?php echo HOST_DOMAIN;?></title>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/color.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript">
		function kc_register_form(thisform){

			login_name = thisform.login.value;


			if (login_name == null || login_name == '') {
				thisform.login.focus();
				return false;
			};

			apos = login_name.indexOf('@');
			dot_pos = login_name.indexOf('.')

			if ((apos > 1 || dot_pos < 2)) {
				art.alert('使用邮箱注册！');
				thisform.login.focus();
				return false;
			};

			pwd = thisform.pwd.value
			next_pwd = thisform.next_pwd.value
			
			if (pwd.length < 6) {
				$('#pwd_intensity').text("(客官不要玩我，低于六位密码是不会通过的。)");
				thisform.pwd.focus();
				return	 false;
			};
			if (pwd != next_pwd) {
				$('#next_pwd').text("(客官，两次密码都不一样，让妹子怎么办？)");
				thisform.next_pwd.focus();
				return false;
			};
			// $(".submit").preventDefault();
			$.post("/login/submit_register",{login:login_name,pwd:pwd,next_pwd:next_pwd},function(json){
				if (parseInt(json.result) == 1) {
					art.alert('就差一步了，到邮箱验证吧！');
				}else{
					art.alert(json.msg);
				}
			}, 'json');
			return false;
		}
		function next_pwd_vali(next_pwd){
			pwd = $('#pwd').val();
			if (pwd == next_pwd) {
				msg = '';
			}else{
				msg = "两次密码不同";
			}
			$('#next_pwd').text(msg);
		}
		function pwd_intensity(pwd){
			if (pwd.length < 6) {
				msg = "至少六位啊，亲...";
				color = "rgb(210, 11, 11)";
			}
			if (pwd.length == 6) {
				msg = "一般般...";
				color = "rgb(190, 11, 210)";
			}
			if (pwd.length == 7) {
				msg = "还可以...";
				color = "rgb(61, 11, 210)";
			}
			if (pwd.length == 8) {
				msg = "强！！！";
				color = "rgb(5, 157, 157)";
			}
			if (pwd.length > 8) {
				msg = "强！强！强！！！";
				color = "rgb(5, 157, 41)";
			};
			$("#pwd_intensity").text(msg);
			$("#pwd_intensity").css("color",color);
			return;
		}
	</script>
</head>
<body class="login">
	<div class="login_con">
		<h1><?php echo HOST_DOMAIN;?></h1>
		<form name="loginform" id="registerform" onsubmit="return kc_register_form(this);">
			<div class="login_input">
				<p>
					<bookmark-label for='user_login'>用户名：<input class="input" type="text" name='login' size='20'></input></bookmark-label>
				</p>
				<p>
					<bookmark-label for='user_pass'>密码 ：<span style="font-size:12px;" id="pwd_intensity"></span><input class="input" type="password" id="pwd" name="pwd" size='20' oninput="pwd_intensity(this.value);" onpropertychange="pwd_intensity(this.value)"></input></bookmark-label>
				</p>
				<p>
					<bookmark-label for='user_pass'>再次输入密码 ：<span style="color:red;font-size:12px;" id="next_pwd"></span><input class="input" type="password" name="next_pwd" size='20' oninput="next_pwd_vali(this.value);" onpropertychange="next_pwd_vali(this.value)"></input></bookmark-label>
				</p>
				<p>
					<input type="hidden" name="textcode" value="<?php //echo $textcode;?>">
					<input class="submit" type="submit" name="submit" value="确认">
					<input type="hidden" name="redirect_to" value="http:www.<?php echo HOST_DOMAIN;?>">
					<input type="hidden" name="textcookie" value="1">
				</p>
			</div>
		</form>
	</div>
	<?php $this->load->view('footer')?>
</body>
</html>