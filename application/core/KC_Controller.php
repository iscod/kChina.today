<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class KC_Controller extends CI_Controller {
	/**
	*
	*@author IsCod
	*@version 2015.01.01
	**/

	/*
	*
	*/
	/**
	*The custom model
	*
	**/

	public $uid = null;

	/**
	*
	*@param boolean $need_login
	*@param mixed $login_redirect_url
	*need_login 是否需要判断登陆
	*login_redirect_url　如果需要登录逻辑，假如用户未登录时该执行的操作
	*logout_redirect_msg　如果需要登录逻辑，假如用户未登录时，跳转到登录页时，在登录页中的提示信息,预留参数2015-7-14
	*/
	public  function __construct($need_login = true, $login_redirect_url = '', $logout_redirect_msg = '') {
		parent::__construct();

		if ($need_login) {
			$this_login = $this->_is_login();
			
			if (!$this_login && $login_redirect_url) {
			//如果未登陆允许跳转则跳转至登陆页面
				$this->_gologin($login_rediect_url, $logout_redirect_msg);
			}
		}
	}

	/**
	*判断是否登陆
	*如果登陆返回true,并给类成员$uid赋值，否则返回flase;
	*is login
	*@return boolean
	*/
	protected function _is_login() {
		$this->load->library('login_lib');
		$is_login = $this->login_lib->init_login();

		if (!$is_login) {
			return false;
		}

		$this->uid = intval($_SESSION['KC_UID']);

		//已登录设置
		if ($is_login) {

			//更新session信息主要是时间
			if (time() - $_SESSION['KC_SYSTIME'] < 3600 ) {
				$this->login_lib->set_cookie_login($this->uid);
			}

			$this->uid = intval($_SESSION['KC_UID']);
			return true;
		}

		return false;

	}

	/**
	*未登陆跳转设置函数
	*@param login_rediect_url跳转到什么地方
	*@param $login_redirect_msg跳转页面需要的参数，暂时没有用户预留借口，2015-7-4
	*@return bool
	*/
    protected function _gologin($login_redirect_url = '', $logout_redirect_msg = '') {
    	if (!$login_redirect_url) {
    		header("location: /login");
    		
    	} else {
    		header("location: /".$login_redirect_url);
    	}

    	exit;
    }

}