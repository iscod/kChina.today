<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, TRUE);
	}

	public function profile() {
		if (!$this->uid) return false;

		$this->load->model('user_model');
		$user_info = $this->user_model->get_by_uid($this->uid);
		$data = array(
			'user_info' => $user_info
			);
		$this->load->view('setting/profile', $data);
	}

	public function logout(){
		if (!$this->uid) return true;
		$this->load->library('login_lib');
		$logout = $this->login_lib->logout();
		if ($logout) {
			header("location: /");
		}else{
			header("location: /home/my");
		}

	}
}