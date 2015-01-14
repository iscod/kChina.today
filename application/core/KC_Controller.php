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

	public $uid=null;

	/**
	*
	*@param boolean $need_login
	*@param mixed $login_redirect_url
	*/
	public  function _construct($need_login = true, $login_redirect_url='') {
		$is_login = $this->_is_login();
	}

	/**
	*is login
	*@return boolean
	*/
	public function _is_login() {
		$this->load->library('login_lib');

		$is_login = $this->login_lib->init_login();
		
		if (!$is_login) {
			setcookie('KCGOLDSPD', '' , time()-86400, '/');
			return false;
		}

		//already login
		$this->uid = intval($_SESSION['KC_UID']); 

	}
}
