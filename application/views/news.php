<!DOCTYPE html>
<html>
<head>
<title>kchina
</title>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
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

</head>
<body>

<button class="btn1">Animate</button>
<button class="btn2">Reset</button>
<div class="valentine">
	kchina
</div>

</body>
</html>