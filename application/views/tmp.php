<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Tmp-<?php echo HOST_DOMAIN;?></title>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/websocket.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript">
		var UID = <?php echo $this->uid?>;
		var webchat = new WebChat('ws://192.168.2.221:7681','dumb-increment-protocol');
		var webpkg = new WebChatPackage();
		webpkg.set_uid(UID);
		webpkg.set_member("A", <?php echo $chatserver['auth'];?>);
    	webpkg.set_member("B", <?php echo $chatserver['extra'];?>);
		$(function(){
			$('.websocket_button').click(function(){
				send_text = $('[name="websocket"]').val();
				webchat.connect(send_text);
				// alert('ok');
			})

			$("table#languasges td:first-child");
		})
	</script>
	<style type="text/css">
	.button button {
		border: 1px solid #E8E8E8;
		background: #F7F7F7;
	}
	.myfirst > li > a{
		color: red;
	}

	</style>
</head>
<body>
	<h1>websocket</h1>
	<div class="websocket">
		<input type="text" name="websocket" value="" >
		<button class="websocket_button" >发送</button>
	</div>
	<div class="websocket_message">返回的数据：</div>

	<div class="button"><button>改变</button></div>
	<ul class="myfirst">
		<li><a href="http:://kchina.today">frist</a></li>
		<li><ul>
			<li class="my_li"><a href='iscod.com'>sss</a></li>
			<li class="my_li red_li"><a href="#">ssss</a></li>
			<li class="my_li red_Li"><a href="#">li</li>
			<li class="my_li"><a href="#">li</li>
			<li class="my_li"><a href="#">li</li>
			<li class="my_li"><a href="#">li</li>
		</ul></li>
	</ul>
	<div id="buttonhref" class="button"><button>href</button></div>
</body>
</html>