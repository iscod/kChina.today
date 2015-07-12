<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<link rel="stylesheet" id="dashicons-css" href="../css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/global.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
	<style type="text/css">
		.book_up_content {  margin: 0 auto; max-width: 960px;}
	</style>
	<script type="text/javascript">
		function book_up(thisform) {
			book_title = thisform.book_title.value;
			book_author = thisform.book_author.value;
			book_commend = thisform.book_commend.value;
			if (book_title == false) {art.alert('亲，忘记填写书名了吧！');return false};
			if (book_author == false) {art.alert('亲，忘记填写作者了吧！');return false};
			if (book_commend == false) {art.alert('亲，描述是必须的，写点你推荐的理由吧！');return false};
			if (thisform.userfile.value == false) {art.alert('亲，选择上传的txt文件哦！');return false};

			// $.post('/book/up_submit', {
			// 	book_title : thisform.book_title.value,
			// 	book_author : thisform.book_author.value,
			// 	book_commend : thisform.book_commend.value,
			// 	book_time : thisform.book_time.value,
			// 	enctype: 'multipart/form-data',
			// 	userfile : thisform.userfile.value
			// 	file:

			// },function(json) {
			// 	if (json.result == 1) {
			// 		top.location='/book/info/'+json.book_id;
			// 	} else {json.result == -3}{
			// 		art.alert(json.msg,'');
			// 	}
			// }, 'json')

			return true;
		}
		// function art_dialog(return_code, msg, data){
		// 	alert('xxx');
		// 	var code_title = new Array();
		// 	code_title['1'] = 'ok';
		// 	code_title['-1'] = 'warn';
		// 	code_title['-2'] = 'error';
		// 	if (return_code = 1) {};
		// 	html = '<div class="art_dialog">';

		// 	html += '<div class="' + code_title[return_code] + '">';

		// 	html +='</div></div>'
		// 	$(document).ready(function(){
		// 		$("#art_dialog").html(html);
		// 	})
	</script>
</head>
</head>
<body class="kc">
<?php $this->load->view('header') ?>
<div class="book_up_content">
	<iframe frameborder="0" name="i" src="/book/upload_form" style="width: 100%;min-height: 300px;border: 0;">
		<!-- <frameset>
		<frame src="/book/upload_form"/>
		</frameset> -->
	</iframe>
	
	
</div>
<?php $this->load->view('footer')?>
</body>
</html>