<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for kc login
*@author iscod
*@timer 2015-2-13
*/
class Login extends KC_Controller {

	/**
	*@author iscod
	*login for index
	*/
	public function index() {
		$data = array();
		$this->load->view('login', $data);
	}

	/**
	*@author iscod
	*login submit
	*/

	public function kc_login() {

		if ($this->uid) {
			echo json_return(RESPONSE_OK, '您已经登陆');
			return true;
		}

		$user_login = $this->input->post('login');
		$pwd = $this->input->post('pwd');
		$redirect_to = $this->input->post('redirect_to');

		$pwd = md5($pwd);

		if (empty($user_login)) {
			echo json_return(RESPONSE_LOGIN, '用户名没有填写');
			return false;
		}

		if (empty($pwd)) {
			echo json_return(RESPONSE_PASS_ERROR, '密码不能是空！');
			return false;
		}

		$this->load->model('user_model');

		$uid = $this->user_model->get_by_username($user_login);

		if (!$uid) {
			echo json_return(RESPONSE_LOGIN, '用户名不正确！');
			return false;
		}

		$user_info = $this->user_model->get_by_uid($uid);

		if (!$user_info) {
			echo json_return(RESPONSE_LOGIN, '用户不存在');
			return false;
		}

		if ($user_info['user_pass'] != $pwd) {
			echo json_return(RESPONSE_PASS_ERROR, '密码不正确！');
			return false;
		}

		$this->load->library('login_lib');
		$user_login = $this->login_lib->set_cookie_login($uid);

		if (!$user_login) {
			echo json_return(RESPONSE_LOGIN, '登陆失败！');
			return false;
		}

		echo json_return(RESPONSE_OK, '登陆成功！');
		return true;

	}
}