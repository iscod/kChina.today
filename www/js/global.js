function focus_kc_weibo(){
	art.dialog({content:'正在开发！'});
	return false;
}
function focus_kc(){
	art.dialog({content:'正在开发！'})
	return false;
}

$(function(){
	$('.follow_user_btn').click(function(){
		var $this = $(this);//保存作用域指针
		var follow = 0;
		if($(this).hasClass('follow_btn')) {follow = 1};
		uid = $(this).attr('data-id');
		$.post('/node/set_follow', {follow:follow,uid:uid},function(json){
			if (json.result == 1) {
				if (follow == 1) {
					$this.html('取消关注');
				}else{
					$this.html('关注TA');
				}
				$this.toggleClass('follow_btn');
				$this.toggleClass('follow_un_btn');
			}else if(json.result == -99){
				top.location = '/login';
			}else{
				art.dialog({content:json.msg});
			}
		}, 'json')
	})
})