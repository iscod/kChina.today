<!DOCTYPE html>
<html>
<head>
<title>kchina</title>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/js/jquery.min.js"></script>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/js/jquery.easing.1.3.js"></script>
<script src="http://js.<?php echo HOST_DOMAIN?>/js/global.js?var=<?php echo JS_VERSION?>"></script>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/js/less.min.js"></script>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/quojs/quo.js"></script>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/quojs/quo.css.js"></script>
<script type="text/javascript" src="http://js.<?php echo HOST_D0MIN?>/quojs/quo.events.js"></script>
<!-- <script type="text/javascript" src="quojs/quo.ajax.js"></script>
<script type="text/javascript" src="quojs/quo.css.js"></script>
<script type="text/javascript" src="quojs/quo.element.js"></script>
<script type="text/javascript" src="quojs/quo.environment.js"></script> -->

<!-- <script type="text/javascript" src="quojs/quo.gestures.js"></script>
<script type="text/javascript" src="quojs/quo.output.js"></script>
<script type="text/javascript" src="quojs/quo.query.js"></script>
<script type="text/javascript" src="quojs/quo.standalone.js"></script> -->

<!-- <script type="text/javascript" src="quojs/quo.standalone.js"></script> -->
<script type="text/javascript">
function curve_animate(top) {

}
jQuery.easing.method = "easelnOutBounce"
$(document).ready(function(){
	$(".btn1").click(function(){
		$(".valentine").animate({
			top: '110px',
			left: '100px'
		});
	});
	$(".btn2").click(function(){
		$(".valentine").animate({
			top: '10px',
			left: '0px'
		}, {easing:'easeInQuad'});
	});
});

</script>

<style type="text/css">
.valentine {
	position: relative;
	left: 0px;
	top: 10px;
	width: 200px;
	height: 100px;
	background: #98bf21;
}
</style>

<script  >
	
	$(document).ready(function(){
		$('.valentine').css('background','red');
		$('.valentine').on("tap", function() {
	    // affects "span" children/grandchildren
	 	   alert('xxx');
		})

	});

	$$(document).ready(function(){
		$$('.valentine').style('height', '128px');
		$$('.valentine').tap(function(){
			alert('xx');
		});
	});

		// $$('div').tap(function(){
		// 	$$(this).style('background','#000')
		// })
	
	$$('element').swipe(function(e) {
  alert(e.pageX);
});

	$$('valentine').on("tap", function() {
    // affects "span" children/grandchildren
    alert('xxx');
});

	
	$$('valentine').swipe(function() {
  $('valentine').vendor('transform','translate(-100px,-100px)');
});
	// $$(".valentine").swipeLeft(function(){
	// 	alert('xxxx');
	// })

</script>
</head>
<body>

<button class="btn1">Animate</button>
<button class="btn2">Reset</button>
<div class="valentine">
	kchina
</div>

</body>
</html>