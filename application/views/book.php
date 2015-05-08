<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<script src="less.min.js"></script>
	<link rel="stylesheet" id="dashicons-css" href="css.kchina.today/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<link rel="stylesheet" id="dashicons-css" href="css.kchina.today/css/book.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
</head>
</head>
<body>
	<?php $this->load->view('header') ?>
	<div class="content_book">
		<div class="book">
			<div class="book_title">
				<h3><?php echo $book_info['book_title']?>-<?php echo $book_info['book_author']; ?></h3>
			</div>

			<div class="book_commend"><?php echo $book_info['book_commend']?></div>
			<div class="xxx">
			<?php echo var_dump($book_info);?>
		</div>
		</div>
		<div class="book_img"><img src="<?php echo $book_info['book_cover']?>" alt="<?php echo $book_info['book_title']?>"></a></div>
		
	</div>
	<?php $this->load->view('footer')?>
</body>
</html>