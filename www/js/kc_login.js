var validate  = {
		log : function (log, is_email){
		if (log == 'undefined' || log == '') {
			return false;
		}

		apos = log.indexOf('@');
		dot_pos = log.indexOf('.');

		if (is_email == true) {
			if (apos < 1 || dot_pos < 1) {
				return false;
			}
		}
		if (apos > 1 && dot_pos < 1) {
			return false;
		}

		return true;
	},
	pwd : function (pwd) {
		if (pwd == null || pwd == '') {
			return false;
		}

		if (pwd.length < 6) {
			return false;
		}

		return true;
	},
	error : function (classname,content,type) {
		if (type === undefined) {return false}

		switch (parseInt(type)) {
			case 1 :
				var text = "<label class='" + classname + "_error'>" + content + "</label>";
				if (classname == 'login') {
					$("input[name='login']").after(text);
				}
				if (classname == 'pwd') {
					$("input[name='pwd']").after(text);
				}
				var width = $("." + classname + "_error").width();
				width = width + 5;
				$("."+classname  + "_error").css("margin-left",-width);
				break;
			case 2 :
				var text = "<div class='" + classname + "_error'>" + content + '</div>';
				$(".login_input").append(text);
				break
			default:
				break;
		}
	}
}

function kc_login_form(thisform, type){

	if (type === undefined ) {art.alert('提示', '数据错误')};

	is_type = validate.log(thisform.login.value);

	if (is_type == false) {
		validate.error('login' , "邮箱错误", type);
		thisform.login.focus();
		return false;
	}

	is_pwd = validate.pwd(thisform.pwd.value);

	if(is_pwd == false) {
		validate.error('pwd' , "密码错误", type);
		thisform.pwd.focus();
		return false;
	}

	if (is_type && is_pwd) {
		$.post("login/kc_login",
		{
			login:thisform.login.value,
			pwd:thisform.pwd.value,
			redirect_to:thisform.redirect_to.value
		},
		function(json) {
			if (json.result == 1) {
				if (thisform.redirect_to == 'undefined') {
					thisform.redirect_to = '/';
				}
				top.location=thisform.redirect_to.value;
			} else if(json.result == -2){
				$(".login_input").append(validate.error('login' ,json.msg, type));
			} else if(json.result == -3){
				$(".login_input").append(validate.error('pwd' ,json.msg, type));
			} else {
				art.alert(json.msg);
			}
		}, 'json');
		return false;
	}
	return false;
}
$(function(){
	$('.header_user').hover(function(){
		$(".js_login_wrpe").show();
	}, function(){
		$(".js_login_wrpe").hide();
	})
})