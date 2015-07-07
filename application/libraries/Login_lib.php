<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for login cookie
*@author iscod
*/
class Login_lib {
	
	private $auth_key = 'KC_LOGIN_AUTH_KEY';
	private $session_keys = array('KC_AUTH', 'KC_USER');

	public function init_login() {
		if (!session_start()) {
			die('Session Start Fail');
		}

		if (empty($_COOKIE['KC_AUTH']) || empty($_COOKIE['KC_USER']) ) {
			$this->_unset_login_session();
			return false;
		}
		
		if (!empty($_SESSION['KC_AUTH']) && $_SESSION['KC_AUTH'] == $_COOKIE['KC_AUTH'] && $_COOKIE['KC_AUTH'] == $this->_login_auth($_COOKIE['KC_USER'])) {
			return true;
		}

		if ($_COOKIE['KC_AUTH'] != $this->_login_auth($_COOKIE['KC_USER'])) {
			$this->_unset_login_session();
			return fasle;
		}

		$user_str = base64_decode($_COOKIE['KC_USER']);

		parse_str($user_str, $user_info);

		if (!is_array($user_info)) {
			$this->_unset_login_session();
			return false;
		}

		foreach ($user_info as $key => $value) {
			$_SESSION[$key] = rawurldecode($value);
		}

		$_SESSION['KC_AUTH'] = $_COOKIE['KC_AUTH'];

		return true;
	}

	public function set_cookie_login($uid, $login_time = 7200) {
		$CI = & get_instance();
		$CI->load->model('user_model');

		$user_info = $CI->user_model->get_by_uid($uid);

		if (!$user_info) {
			return false;
		}

		$cookie = array(
			'KC_UID' => $user_info['uid'],
			'KC_USERNAME' => $user_info['user_login'],
			'KC_SYSTIME' => time()
		);
		
		$package = 'kc=userinfo';

		foreach ($cookie as $key => $value) {
			$package .= '&' . $key . '=' . urlencode($value);
		}

		$package = base64_encode($package);
		$time = time() + $login_time;

		$kc_auth = $this->_login_auth($package);

		$session_keys = $this->session_keys;

		setcookie($session_keys[0], $kc_auth, $time, '/');
		setcookie($session_keys[1], $package, $time, '/');

		return true;
	}

	/*
	*auth login for cookie
	*/

	private function _login_auth($userinfo_package) {

		$key = base64_encode($this->auth_key);

		return sha1(md5($userinfo_package . $key));
	}
	/**
	*删除cookie
	*/
	private function _unset_login_session() {
		$session_keys = $this->session_keys;

		foreach ($session_keys as $value) {
			setcookie($value, '' , time()-3600);
		}
		return true;
	}
}