<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/global.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/kc_login.js?var=<?php echo JS_VERSION ?>"></script>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/book.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
</head>
</head>
<body class="kc">
	<?php $this->load->view('header') ?>
	<div class="content_book">
		<div class="book_inner">
			<div class="book_wrap">
				<div class="book_wrap_header">
					<div class="book_title"><?php echo $book_info['book_title']?></div>,
					<div class="book_commend"><?php echo $book_info['book_commend']; ?></div>
				</div>
				<div class="book_wrap_content">
					<div class="book_wrap_face"><img src="<?php echo $book_info['book_cover']?>" alt="<?php echo $book_info['book_title']?>"></div>
					<div class="book_info">
						<div class="items">
							<div class="item"><i class="icon icon_author" title="作者">作者</i><span class="item_span book_author"><?php echo (isset($book_info['book_author']) && $book_info['book_author']) ? $book_info['book_author'] : '不祥'; ?></span></div>
							<div class="item"><i class="icon icon_time" title="出版时间">出版时间</i><span class="item_span book_author"><span class="item_span book_time"><?php echo (strtotime($book_info['book_time']) > 0) ? $book_info['book_time'] : '不祥'; ?></span></span></div>
							<div class="item"><i class="icon icon_star" title="推荐指数">推荐指数</i><span class="item_span book_star"><?php echo $book_info['kc_level']?></span></div>
						</div>
						<div class="book_intr">
							<div class="tiem">
								<span class="item_span book_span_intr">
								以上世纪70年代中期到80年代中期为社会背景，以孙少安、孙少平兄弟俩的命运为主轴，讲述了包括田润叶、田晓霞、贺秀莲、田润生等在内的年轻人面临现实的挫折、压力、抉择，却从未放弃对理想、爱情坚韧执着的追求。王雷和袁弘在剧中分别饰演哥哥孙少安，弟弟孙少平。兄弟俩出身贫农，他们平凡但不平庸、更不甘受命运所摆布。一个带领全村致富、一个进城打工，凭借自己的双手，创造出一番属于各自的事业。演员佟丽娅将出演孙少安的初恋田润叶，而王雷的妻子李小萌将在剧中扮演孙少平的恋人田晓霞。这对出身干部家庭的姐妹花，不畏世俗的眼光，爱上孙家两个穷小子，并陷入了深深的情感纠葛中
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="book_wrap_footer">
					<a class="item item_home first active" href="/book/info/<?php echo $book_info['uid']?>">
						<i class="icon icon_home"></i><span class="hide-text">主页</span>
					</a>
					<div class="item">人气<i class="icon icon_heat" title="人气">人气</i><span class="item_span book_heat"><?php echo $book_info['book_heat']?></span></div>
					<div class="item">赞同<i class="icon icon_agree" title="赞同">赞同</i><span class="item_span book_agree"><?php echo (isset($book_info['book_agree']) && $book_info['book_agree']) ? $book_info['book_agree'] : 0 ?></span></div>
				</div>
			</div>
		</div>
		<div class="book_inner">
			<div class="book_wrap">
				<div class="book_wrap_discuss">
					<div class="book_discuss_header">
						<div class="discuss_title">人总是不断向前的</div>
					</div>
					<div class="book_wrap_content">
						以上世纪70年代中期到80年代中期为社会背景，以孙少安、孙少平兄弟俩的命运为主轴，讲述了包括田润叶、田晓霞、贺秀莲、田润生等在内的年轻人面临现实的挫折、压力、抉择，却从未放弃对理想、爱情坚韧执着的追求。王雷和袁弘在剧中分别饰演哥哥孙少安，弟弟孙少平。兄弟俩出身贫农，他们平凡但不平庸、更不甘受命运所摆布。一个带领全村致富、一个进城打工，凭借自己的双手，创造出一番属于各自的事业。演员佟丽娅将出演孙少安的初恋田润叶，而王雷的妻子李小萌将在剧中扮演孙少平的恋人田晓霞。这对出身干部家庭的姐妹花，不畏世俗的眼光，爱上孙家两个穷小子，并陷入了深深的情感纠葛中
					</div>
					<div class="book_discuss_footer">
						<div class="item"><i class="icon icon_un_agree" title="赞同"></i>0</div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('footer')?>
</body>
</html>