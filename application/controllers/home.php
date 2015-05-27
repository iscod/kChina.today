<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}

	public function my() {
		if (!$this->uid) return false;

		$this->load->model('user_model');
		$userinfo = $this->user_model->get_by_uid($this->uid);
		var_dump($userinfo);

		$this->load->view('home/my');
	}
}