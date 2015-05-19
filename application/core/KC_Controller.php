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
	*/
	public  function __construct($need_login = true, $login_redirect_url='') {
		parent::__construct();
		if ($need_login) {
			$is_login = $this->_is_login();
		}
	}

	/**
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

	}
}
