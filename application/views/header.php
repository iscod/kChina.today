<div class="fullpageheader">
	<div class="header">
		<h1 class="div_inline"><a href="http://<?php echo HOST_DOMAIN;?>"><?php echo HOST_DOMAIN;?></a></h1>
		<div class="nav_links div_inline">
			<ul>
				<li><a target="_blank" class="lnk_book" href="/book" target="_blank">读书</a></li>
				<li><a target="_blank" class="lnk_travel" href="/traver" target="_blank">旅行</a></li>
				<li><a target="_blank" class="lnk_love" href="/love" target="_blank">爱情</a></li>
				<li><a target="_blank" class="lnk_shoot" href="/shoot" target="_blank">摄影</a></li>
				<li><a target="_blank" class="lnk_topic" href="/topic" target="_blank">话题</a></li>
				<!-- <li><a target="_blank" class="lnk_donate" href="/donate" target="_blank">捐赠</a></li> -->
			</ul>
		</div>
		<div class="srh"></div>
	<?php if($this->uid): ?>
		<div class="header_user">
			<span class="user_name"><?php echo $user_info['user_login']?></span>
			<div class="js_login_wrpe">
				<ul>
					<li><a href="/home/my" target="_blank">用户中心</a></li>
					<li><a href="#" target="_blank">我的kc</a></li>
					<li><a href="/home/logout" traget="_blank">登出</a></li>
				</ul>
			</div>
		</div>
	<?php else: ?>
		<div class="head_login">
			<form action="/login/kc_login" method="post" onsubmit="return kc_login_form(this);">
				<span><input class="input" type="text" name="login" placeholder="邮箱"></span>
				<span><input class="input" type="password" name="pwd" placeholder="密码"></span>
				<span><input type="hidden" name="redirect_to" value=""><input type="hidden" name="textcookie" value="1"></span>
				<span><input class="submit" type="submit" name="submit" value="登陆"></span>
				<span><a class="register" target="_blank" href="/login/register">注册</a></span>
			</form>
		</div>
	<?php endif;?>
	</div>
</div>