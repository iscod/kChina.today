<div class="header">
	<h1><a href="/"><?php echo HOST_DOMAIN;?></a></h1>
	<div class="nav_links">
		<ul>
			<li><a target="_blank" class="lnk_book" href="/book" target="_blank">读书</a></li>
			<li><a target="_blank" class="lnk_travel" href="/traver" target="_blank">旅行</a></li>
			<li><a target="_blank" class="lnk_love" href="/love" target="_blank">爱情</a></li>
			<li><a target="_blank" class="lnk_shoot" href="/shoot" target="_blank">摄影</a></li>
			<li><a target="_blank" class="lnk_topic" href="/topic" target="_blank">话题</a></li>
			<li><a target="_blank" class="lnk_donate" href="/donate" target="_blank">捐赠</a></li>
		</ul>
	</div>
	<div class="srh"></div>
	<?php if(!isset($is_login) || $is_login):?>
	<div class="head_login">
		<form action="/login/kc_login" method="post" onsubmit="return kc_login_form(this);">
			<span><input class="input" type="text" name="login" placeholder="邮箱"></span>
			<span><input class="input" type="password" name="pwd" placeholder="密码"></span>
			<span><input class="submit" type="submit" name="submit" value="登陆"></span>
		</form>
	</div>
	<?php endif;?>
</div>
