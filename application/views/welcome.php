<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/global.js?var=<?php echo JS_VERSION?>"></script>
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
<body class="kc">
<?php $this->load->view('header') ?>
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