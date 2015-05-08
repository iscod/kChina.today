<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>kChina</title>
	<link rel="stylesheet" id="dashicons-css" href="http://css.kchina.today/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<link rel="stylesheet" id="dashicons-css" href="http://css.kchina.today/css/color.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all"/>
	<script type="text/javascript" src="http://js.kchina.today/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.kchina.today/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.kchina.today/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.kchina.today/js/simlepop.js?var=<?php echo JS_VERSION ?>"></script>
</head>
<body class="login">
<?php //$this->load->view('header') ?>
	<div class="login_con">
		<h1>kChina.today</h1>
	</div>
	<div class="content_register">
		<div class="content_know" style="background:url(/image/know/know_xuanwu_1.png);">
			<div class="know_title">玄武岩</div>
			<div class="know_content">玄武岩(basalt)，洋壳主要组成，属基性火山岩。是地球洋壳和月球月海的最主要组成物质，也是地球陆壳和月球月陆的重要组成物质。1546年，G.阿格里科拉首次在地质文献中，用basalt这个词描述德国萨克森的黑色岩石。汉语玄武岩一词，引自日文。日本在兵库县玄武洞发现黑色橄榄玄武岩，故得名</div>
			</div>
		<div class="register_code">
			<?php if (isset($error) && $error == 'time_out'): ?>
				<p>您估计在两天前申请过KC，但是你知道的，我们不会保留那么长的时间的。建议您再申请注册一次，进行验证。</p>
				<p>访问<a href="/"><?php echo HOST_NAME;?></a></p>
			<?php endif;?>
			<?php if (isset($error) && $error == 'email_error'): ?>
				<p>我不确定您是本人，So，不约了大叔。</p>
			<?php endif;?>
			<?php if (isset($error) && $error == 'set_out'): ?>
				<p>您的信息是正确的，But可能是服务器出现了问题，没能给你创建账户，So，您可以尝试刷新页面再试一次，或者联系我们，说不定能结交到妹子。</p>
				<p>访问<a href="/"><?php echo HOST_NAME;?></a></p>
				<p>访问<a href="/"><?php echo HOST_NAME;?></a></p>
			<?php endif; ?>
			<?php if (isset($error) && $error == 'is_uid'): ?>
				<p>O！该邮箱已经在Kc的注册表中了，使用<?php echo $email;?>进行登录吧！</p>
				<p>访问<a href="/"><?php echo HOST_NAME;?></a></p>
			<?php endif;?>
			<?php if (isset($uid) && $uid) :?>
				<p>Kc等待您已经很久了，开始认识这个世界吧！使用<?php echo $email;?>进行登录，设置自己账号信息吧！</p>
				<p>访问<a href="/"><?php echo HOST_NAME;?></a></p>
			<?php endif;?>
		</div>
	</div>
	<?php $this->load->view('footer')?>
</body>
</html>