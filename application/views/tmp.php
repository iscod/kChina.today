<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Tmp-<?php echo HOST_DOMAIN;?></title>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/jquery.min.js?var=<?php echo JS_VERSION ?>"></script>
	<script type="text/javascript" src="http://js.<?php echo HOST_DOMAIN;?>/js/websocket.js?var=<?php echo JS_VERSION ?>"></script>
	<link rel="stylesheet" id="dashicons-css" href="http://css.<?php echo HOST_DOMAIN?>/css/style.css?ver=<?php echo CSS_VERSION?>" type="text/css" media="all">
	<!---
	<script type="text/javascript">
		var UID = 1<?php echo $this->uid ?>;
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
-->
	<style type="text/css">
	.button button {
		border: 1px solid #E8E8E8;
		background: #F7F7F7;
	}
	.myfirst > li > a{
		color: red;
	}
	div.mondule .caption{
		color: red;
	}
	div.mondule.regit .caption{
		color: blue;
	}
	.queue {
		background: #f0f0f0;
		border:1px solid #a9a9a9;
		width: 200px;
		position: relative;
	}
	</style>
	<script type="text/javascript">
		$(function(){
			// $('h1').html('xx')
			// .css('color', 'red')
			// .css('font-size', '20px');
			var x = $(".my_li:first").attr('data-ning');
			// alert(x);
			var arr = ['firts', 'two'];
			$("#jq_attr").attr({'class':'first','data-ning':'two'})
			.attr({'title':'huawei', 'data-web':'xxx'});
			$("#jq_attr").addClass('x first two');
			$('#jq_attr').removeClass('first');

			$('#jq_attr').after('<span>a</span>');

			// $(".myfirst li:first").html('nihao');
			// $("#jq_attr").replaceWith('<div id="xxx">asd</div>');
			$(".myfirst li").replaceAll('<li>this-li</li>');
			$('form button').onclick =function(event){
				alert('this is ok');
			}
			// $('form button').onclick = function(){
			// 	alert('this is two');
			// }
		})
		function jishu(){
			$('.myfirst li:odd').toggleClass('red');
		}
		function fuanzhuan(){
			$('.myfirst li').toggleClass('red');
		}
		// if (typeof(x) == undefined) {
		// 	$(".myfirst li:first").html('nihao');
		// }

		var d = new Date();

		var ride = {
			make : 'make',
			'have space' : 'have is space object',
			year : '2015-6',
			time : Date.now,
			date : d.getTime(),
			jsfunction : function(pwd) {
				alert(pwd);
			}
		}
		ride.now = Date.now;

		var foo = 'bar';

		jsisobject = function(x){
			alert(x);
		}


	</script>
</head>
<body>
	<h1>websocket</h1>
	<div class="websocket">
		<input type="text" name="websocket" value="" >
		<button class="websocket_button" >发送</button>
	</div>
	<div class="websocket_message">返回的数据：</div>
	<div id="jq_attr">jq_attr</div>
	<div class="button"><button>改变</button></div>
	<ul class="myfirst">
		<li><a href="http:://kchina.today">frist</a></li>
		<li><ul>
			<li class="my_li" data-ning="firts"><a href='iscod.com'>sss</a></li>
			<li class="my_li red_li"><a href="#">ssss</a></li>
			<li class="my_li red_Li"><a href="#">li</a></li>
			<li class="my_li"><a href="#">li</a></li>
			<li class="my_li"><a href="#">li</a></li>
			<li class="my_li"><a href="#">li</a></li>
		</ul></li>
	</ul>
	<div id="buttonhref" class="button"><button>href</button></div>
	<div class="jsobject">this is not</div>
	<form onsubmit="return false;" action="/tmp">
		<button>提交</button>
	</form>

	<div class="mondule">
		<div class="caption">
			<span>Module capton</span>
			<i class="icon icon_adderss"></i>
		</div>
		<div class="body">
			fashdfkhksdfksjdfhhfkhaskdfh<br/>
			fkjsdklflsjdfkjksf<br/>
			dsfjkjksdfjlksjdf<br/>
			dfgjksjdgk<br/>
			fasjdlfjlkjsldfjklsdf<br/>
		</div>
		<div class="fade">
			<p>this is fade</p>
		</div>
	</div>
	<div class="queue">
		<p>this is animate</p>
		<button>start</button>
	</div>
	<script type="text/javascript">
		$(function(){
			$('div.caption i').click(function(){

				$(this).closest('div.mondule').find('div.body').toggle('slow',function(){
					$(this).closest('div.mondule').toggleClass('regit',$(this).is(':hidden'));
				});


				var fade$ = $(this).closest('div.mondule').find('div.fade');
				if (fade$.is(':hidden')) {
					fade$.fadeIn('slow');
				}else{
					fade$.fadeOut('slow');
				}
			})


			$('div.queue').queue('move', function(){
				$(this).animate({top: '+=50', left: '+=50'},'slow');
				$(this).dequeue('move');
			});
			$('div.queue').queue('move', function(){
				$(this).animate({top: '-=50', left: '-=50'}, 'slow');
				$(this).dequeue('move');
			});
			$('div.queue button').click(function(){
				$(this).closest('div.queue').dequeue('move');
			})


			var anarray = [1,2,3,4];
			for (var i = anarray.length - 1; i >= 0; i--) {
				$('body').append(anarray[i]);
			};

			var anobject = {name:'ning', one:'one'};
			for(var n in anobject){
				$('body').append(anobject[n])
			}

			$.each(anobject,function(n,value){$('body').append(value)});

		})




	</script>
</body>
</html>