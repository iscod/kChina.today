<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" scr="http://js.<?php echo HOST_DOMAIN;?>/js/websocket.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript">
		//websocrt尽在html支持时

		// var connention = new WebSocket('ws://www.<?php echo HOST_DOMAIN?>/websocrt', ['soap'], ['xmpp'])

		//如果连接打开推送一条消息
		// connention.onopen = function() {
		// 	connention.send('Ping')
		// }

		//log error
		// connention.onerror = function () {
		// 	connention.log('WebSocket Error' + error);
		// }

		//服务器日志消息
		// connention.onmessage = function (e) {
		// 	console.log('Server: ' + e.data);
		// }

	</script>
</head>
</head>
<body>
<?php $this->load->view('header') ?>
<div id="content_login">
	<div class="warpper">
		<div class="warpper_pic">
			<h1><?php echo HOST_DOMAIN?></h1>
			<div class="warpper_des">一次说走就走的旅行，一场奋不顾身的爱情</div>
		</div>
		<div class="warpper_login">
			<!-- action="/login/kc_login" method="post" -->
			<form action="/login/kc_login" method="post" onsubmit="return kc_login_form(this);">
				<div class="login_input">
					<p>
						<bookmark-label for='user_login'><input class="input" type="text" name='login' size='20' placeholder="邮箱"></input></bookmark-label>
					</p>
					<p>
						<bookmark-label for='user_pass'><input class="input" type="password" name="pwd" size='20' placeholder="密码"></input></bookmark-label>
					</p>
					<p>
						<input class="submit" type="submit" name="submit" value="登录">
						<input type="hidden" name="redirect_to" value="http://www.<?php echo HOST_DOMAIN;?>">
						<input type="hidden" name="textcookie" value="1">
						<a target="_blank" href="/login/register">注册</a>
					</p>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="content_travel" class="section_con">
	<div class="warpper">
		<div class="warpper_nav">
			<div class="nav_title"><h2><a href="/book" target="_blank">旅行</a></h2></div>
			<div class="nav_links">
				<ul>
					<li><a href="#" target="_blank">美景</a></li>
					<li><a href="#" target="_blank">地区</a></li>
					<li><a href="#" target="_blank">评论</a></li>
					<li><a href="#" target="_blank">推荐</a></li>
				</ul>
			</div>
		</div>
		<div class="warpper_main">
			<h2>热门风景&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2><span class="more">(<a href="/book/list" target="_blank">更多</a>)</span>
			<?php foreach ($load_book['books'] as $book) { ?>
				<div class="main_book" id="book_<?php echo $book['book_id']?>">
					<div class="book_img"><a href="/book/info/<?php echo $book['book_id']?>" target="_blank"><img src="<?php echo $book['book_cover']?>" alt="<?php echo $book['book_title']?>" width="245px" height="245px"></a></div>
					<div class="book_footer">
						<div class="book_title"><?php echo $book['book_title']?></div>
						<div class="book_commend"><?php echo $book['book_commend']?></div>
					</div>
					<!-- <div class="book_time"><?php echo $book['book_time']?></div>
					<div class="book_level">推荐指数：<?php echo $book['level']?></div>
					<div class="book_kc_level">Kc推荐指数：<?php echo $book['kc_level']?></div>
					<div class="book_heat">book_heat</div> -->
				</div>
			<?php }?>
		</div>
	</div>

</div>
<div id="content_book" class="section_con">
	<div class="warpper">
		<div class="warpper_nav">
			<div class="nav_title"><h2><a href="/book" target="_blank">读书</a></h2></div>
			<div class="nav_links">
				<ul>
					<li><a href="#" target="_blank">阅读</a></li>
					<li><a href="#" target="_blank">作者</a></li>
					<li><a href="#" target="_blank">书评</a></li>
					<li><a href="#" target="_blank">推荐</a></li>
				</ul>
			</div>
		</div>
		<div class="warpper_main">
			<h2>新书推荐&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;</h2><span class="more">(<a href="/book/list" target="_blank">更多</a>)</span>
			<?php foreach ($load_book['books'] as $book) { ?>
				<div class="main_book" id="book_<?php echo $book['book_id']?>">
					<div class="book_img"><a href="/book/info/<?php echo $book['book_id']?>" target="_blank"><img src="<?php echo $book['book_cover']?>" alt="<?php echo $book['book_title']?>" width="245px" height="245px"></a></div>
					<div class="book_footer">
						<div class="book_title"><?php echo $book['book_title']?></div>
						<div class="book_commend"><?php echo $book['book_commend']?></div>
					</div>
					<!-- <div class="book_time"><?php echo $book['book_time']?></div>
					<div class="book_level">推荐指数：<?php echo $book['level']?></div>
					<div class="book_kc_level">Kc推荐指数：<?php echo $book['kc_level']?></div>
					<div class="book_heat">book_heat</div> -->
				</div>
			<?php }?>
		</div>
	</div>
</div>
<div id="content_shoot" class="section_con">
	<div class="warpper">
		<?php var_dump($load_book);?>
	</div>
</div>
<div id="content_live" class="section_con">
	<div class="warpper">
	</div>
</div>
<div id="content_topic" class="section_con">
	<div class="warpper">
	</div>
</div>
<?php $this->load->view('footer')?>
</body>
</html>