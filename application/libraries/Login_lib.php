<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_lib() {
	private $auth_key = KC_LOGIN_AUTH_KEY
	public function init_login() {
		if (!session_start()) {
			die('Session Start Fail');
		}
		
	}
}