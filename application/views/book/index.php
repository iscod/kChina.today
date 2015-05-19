<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Welcome kChina</title>
	<meta name="description" content="免费图书、分享旅行、爱情、话题的文化长廊">
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/less.min.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.fullPage.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.slimscroll.js?var=<?php echo JS_VERSION?>"></script>
	<script src="http://js.<?php echo HOST_DOMAIN?>/js/jquery.easings.min.js?var=<?php echo JS_VERSION?>"></script>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/jquery.fullPage.css?var=<?php echo CSS_VERSION?>" TYPE="text/css" media="all">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/book.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#fullpage').fullpage({
	        //Navigation
	        menu: false,
	        // anchors:['firstPage', 'secondPage', 'threePage', 'fourPage', 'lastPage'],
	        navigation: true,
	        navigationPosition: 'right',
	        navigationTooltips: ['firstSlide', 'secondSlide'],
	        showActiveTooltips: false,
	        slidesNavigation: true,
	        slidesNavPosition: 'bottom',

	        //Scrolling
	        css3: true,
	        scrollingSpeed:1000,
	        autoScrolling: true,
	        fitToSection: true,
	        scrollBar: false,
	        easing: 'easeInOutCubic',
	        // easingcss3: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',
	        easingcss3: 'cubic-bezier(0.15, 0.185, 0.820, 1.275)',
	        loopBottom: false,
	        loopTop: false,
	        loopHorizontal: true,
	        continuousVertical: false,
	        normalScrollElements: '#element1, .element2',
	        scrollOverflow: false,
	        touchSensitivity: 15,
	        normalScrollElementTouchThreshold: 5,

	        //Accessibility
	        keyboardScrolling: true,
	        animateAnchor: true,
	        recordHistory: true,

	        //Design
	        controlArrows: true,
	        verticalCentered: true,
	        resize : false,
	        sectionsColor : ['#fff'],
	        paddingTop: '3em',
	        paddingBottom: '10px',
	        fixedElements: '#header, .footer',
	        responsive: 0,

	        //Custom selectors
	        sectionSelector: '.section',
	        slideSelector: '.slide',

	        //events
	        onLeave: function(index, nextIndex, direction){},
	        afterLoad: function(anchorLink, index){},
	        afterRender: function(){},
	        afterResize: function(){},
	        afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
	        onSlideLeave: function(anchorLink, index, slideIndex, direction){}
	    });
	});
	</script>
	<style type="text/css">
		.fullpageheader{
			position: fixed;
			background: #fff;
			z-index: 999;
			width: 100%;
			border-bottom: 1px double #D7D7D7;
		}
		.section {
			color: #0D0D0D;
		}
		.section_0 {
			background: url(http://img.<?php echo HOST_DOMAIN?>/image/book/bg_section_0.jpg?var=<?php echo IMG_VERSION?>) 0% 0% no-repeat;
		}
		.section_1 {
			background: url(http://img.<?php echo HOST_DOMAIN?>/image/book/bg_section_1.jpg?var=<?php echo IMG_VERSION?>) 0% 0% no-repeat;
		}
		.section_2 {
			background: url(http://img.<?php echo HOST_DOMAIN?>/image/book/bg_section_2.jpg?var=<?php echo IMG_VERSION?>) 0% 0% no-repeat;
		}
		.section_3 {
			background: url(http://img.<?php echo HOST_DOMAIN?>/image/book/bg_section_3.jpg?var=<?php echo IMG_VERSION?>) 0% 0% no-repeat;
		}
		.section_4 {
			background: url(http://img.<?php echo HOST_DOMAIN?>/image/book/bg_section_4.jpg?var=<?php echo IMG_VERSION?>) 0% 0% no-repeat;
		}
		.content_book {
			margin: 0 auto;
			max-width: 960px;
			font-size: 14px;
			/*text-align: right;*/
		}
		.content_book .book_box{
			width: 30%;
			float: right;
			text-align: right;
			padding: 10px 20px;
			background: rgba(255, 255, 255, 0.4);
			border-radius: 3% 3%;
		}
		.content_book .booktitle {
			font-size: 24px;
			line-height: 3em;
		}
		.content_book .booknew {
		}
	</style>
</head>
<body>
	<div class="fullpageheader">
		<?php $this->load->view('header') ?>
	</div>
	<div id="fullpage">
	    <div class="section section_0">
	    	<div class="content_book">
	    		<div class="book_box">
		    		<div class="booktitle">平凡的世界</div>
		    		<div class="booknew">
		    			<div class="bookauthor">路遥</div>
		    			<div class="booktime">出版时间：2010年</div>
		    			<div class="bookcommend">一部对时代人生爱情的伟大阐释</div>
		    			<div class="bookregistered">分享时间：2015-02-38 11:46:28</div>
		    			<div class="bookheat">人气：10</div>
		    			<div class="kc_level">推荐指数：1</div>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	    <div class="section section_1">
	    	<div class="content_book">第一屏</div>
	    </div>
	    <div class="section section_2">
	    	<div class="content_book">第一屏</div>
	    </div>
	    <div class="section section_3">
	    	<div class="content_book">第一屏</div>
	    </div>
	    <div class="section section_4">
	    	<div class="content_book">第一屏</div>
	    </div>
	</div>
</body>
</html>

