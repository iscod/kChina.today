<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for kc login
*@author iscod
*@timer 2015-2-13
*/
class Login extends KC_Controller {

	public function __construct()
	{
		parent::__construct(FALSE, FALSE);
	}

	/**
	*@author iscod
	*login for index
	*/
	public function index() {
		$data = array();
		$this->load->view('login/login', $data);
	}

	/**
	*@author iscod
	*login submit
	*/

	public function kc_login() {

		if ($this->uid) {
			echo json_return(RESPONSE_OK, '已经登录');
			return true;
		}

		$user_login = $this->input->post('login');
		$pwd = $this->input->post('pwd');
		$redirect_to = $this->input->post('redirect_to');

		$pwd = md5($pwd);

		if (empty($user_login)) {
			echo json_return(RESPONSE_LOGIN, '呵呵，无名氏！');
			return false;
		}

		if (empty($pwd)) {
			echo json_return(RESPONSE_PASS_ERROR, '请填写密码');
			return false;
		}

		$this->load->model('user_model');

		if (strstr($user_login, "@")) {
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$user_login)) {
				echo json_return(RESPONSE_ERROR, '邮箱不正确');
				return false;
    		}
    		$uid = $this->user_model->get_by_email($user_login);
		}else{
			$uid = $this->user_model->get_by_username($user_login);
		}

		if (!$uid) {
			echo json_return(RESPONSE_LOGIN, '尚未注册');
			return false;
		}

		$user_pass = $this->user_model->get_pass_by_uid($uid);

		if (!$user_pass) {
			echo json_return(RESPONSE_LOGIN, '数据错误');
			return false;
		}

		if ($user_pass != $pwd) {
			echo json_return(RESPONSE_PASS_ERROR, '用户名或密码错误');
			return false;
		}

		$this->load->library('login_lib');
		$user_login = $this->login_lib->set_cookie_login($uid);

		if (!$user_login) {
			echo json_return(RESPONSE_ERROR, '网络异常');
			return false;
		}

		echo json_return(RESPONSE_OK, '登录成功');
		return true;

	}

	public function register() {
		$this->load->view('login/register');
	}
	/**
	*register for kc
	*@return json
	*/
	public function submit_register() {
		$email = $this->input->post('login');
		$pwd = $this->input->post('pwd');
		$next_pwd = $this->input->post('next_pwd');

		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo json_return(RESPONSE_ERROR, '你知道的，这样不好。');
			return false;
		}

		// var_dump($pwd);
		if (preg_match("/^[a-zA-z]+[ ]/", $pwd)) {
			echo json_return(RESPONSE_ERROR, '密码中包含空格，这想法不错，but，不会记录到数据库的。');
			return false;
		}

		if (strlen($pwd) < 6) {
			echo json_return(RESPONSE_ERROR, 'Hi，你的密码地球人都知道！');
			return false;
		}

		if ($pwd != $next_pwd) {
			echo json_return(RESPONSE_PASS_ERROR, '报告大王，两次密码不同啊！');
			return false;
		}

		$this->load->model('user_model');
		$is_user = $this->user_model->get_by_email($email);
		if ($is_user) {
			echo json_return(RESPONSE_ERROR, '邮箱已经已存在。');
			return false;
		}

		$val_key = get_rand_str(20);

		$val_key = md5($val_key);

		if (Mcache::read('register_code_key' . $val_key)) {
			$val_key = get_rand_str(20);
		}

		Mcache::write('register_code_key' . $val_key, $email, 3600*48);
		Mcache::write('register_code_email_pwd' . $val_key, $pwd);

		$send_email = $this->register_set_email($email, $val_key);
		if (!$send_email) {
			echo json_return(RESPONSE_ERROR, '服务器接待客户太多，想炒老板鱿鱼了！客官，再试试');
			return false;
		}

		echo json_return(RESPONSE_OK, 'ok');
		
	}

	/**
	*注册验证
	*@param string email string code string time
	*@return bool true|false
	*/
	public function register_code() {
		$md_email = $this->input->get('email');
		$code = $this->input->get('code');
		$time = $this->input->get('time');

		$email = Mcache::read('register_code_key' . $code);

		$data = array();
		if ($email) {
			$data['error'] = 'time_out';
		}

		if (md5($email) != $md_email && strtotime('-2 day') < $time) {
			$data['error'] = 'email_error';
		}
		
		$user_info['user_login'] = '';
		$user_info['user_email'] = $email;
		$pwd = Mcache::read('register_code_email_pwd' . $code);
		$user_info['user_pass'] = md5($pwd);
		$user_info['user_nickname'] ='';
		$user_info['user_registered'] = date('Y-m-d H:i:s');
		$user_info['user_status'] = 0;
		$this->load->model('user_model');
		$uid = $this->user_model->get_by_email($email);
		if ($uid) {
			$data['error'] = 'is_uid';
			$data['email'] = $email;
			$this->load->view('login/register_confirm', $data);
			return false;
		}
		$set_uid = $this->user_model->set_user_insert($user_info);
		if (!$set_uid) {
			$data['error'] = 'set_out';
			$this->load->view('login/register_confirm', $data);
			return false;
		}
		$data['email'] = $email;
		$data['uid'] = $uid;

		$this->load->view('login/register_confirm', $data);
	}

	/**
	*注册发送验证邮件
	*@param email $to_email, string $val_key
	*@return bool ture || false
	*/

	private function register_set_email($to_email, $val_key) {
		$this->load->library('email');
		$this->email->clear();
		$this->email->from('ascoon@163.com', 'ascoon');
		$this->email->to($to_email);
		$this->email->subject('加入' . HOST_NAME . '，和我们一起探讨世界');
		$code_url = "http://" . HOST_DOMAIN . "/login/register_code?email=".md5($to_email)."&code=".$val_key."&time=".time();
		$content = "
			加入" . HOST_NAME . "，和我们一起探讨世界，你需要到该地址进行验证，可不要被问题卡住哦！<br/>
			{unwrap}<a href='".$code_url."'>".$code_url."</a>{/unwrap}
		";
		$this->email->message($content);
		$return = $this->email->send();

		return $return;
	}
}