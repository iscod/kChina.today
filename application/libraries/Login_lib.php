<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for login cookie
*@author iscod
*/
class Login_lib {
	
	private $auth_key = 'KC_LOGIN_AUTH_KEY';
	
	public function init_login() {
		if (!session_start()) {
			die('Session Start Fail');
		}
		
	}

	public function set_cookie_login($uid, $login_time = 0) {
		$this->load->model('user_model');

		$user_info = $this->user_model->get_by_uid($uid);

		if (!$user_info) {
			return false;
		}

		$cookie = array(
			'KC_UID' => $user_info['id'],
			'KC_USERNAME' => $user_info['user_login'],
			'KC_SYSTIME' => time()
		);
		
		$package = 'kc=userinfo';

		foreach ($cookie as $key => $value) {
			$package += '&' + $key + '=' + urlencode($value);
		}

		$package = base64_encode(gzcompress($package, 8));
		$time = time() + $login_time;

		$kc_auth = $this->_login_auth($package);

		setcookie('KC_AUTH', $kc_auth, '/');
		setcookie('KC_USER', $package, '/');

		return TRUE;
	}

	/*
	*auth login for cookie
	*/

	private function _login_auth($userinfo_package) {
		return sha1(md5($userinfo_package . $this->auth_key));
	}
}