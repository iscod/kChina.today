function validate_log(log){
	if (log == 'undefined' || log == '') {
		return false;
	}

	apos = log.indexOf('@');
	dot_pos = log.indexOf('.');
	
	if ((apos > 1 && dot_pos < 1)) {
		art.alert('您似乎使用邮箱登陆，但填写的不正确！');
		return false;
	}

	return true;
}
function validate_pwd (pwd) {
	if (pwd == null || pwd == '') {
		return false;
	}

	if (pwd.length < 6) {
		art.alert('用户名或密码不正确！');
		return false;
	}

	return true;
}
function kc_login_form(thisform){
	is_type = validate_log(thisform.login.value);

	if (is_type == false) {
		thisform.login.focus();
		return false;
	}

	is_pwd = validate_pwd(thisform.pwd.value);

	if(is_pwd == false) {
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
				art.alert(json.msg);
				if (thisform.redirect_to == 'undefined') {
					thisform.redirect_to = '';
				}
				top.location=thisform.redirect_to.value;
				
			} else {
				art.alert(json.msg);
			}
		}, 'json');
		return false;
	}
	return false;
}