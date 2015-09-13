<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);

	}

	/**
	*个人主页
	*@param name || uid
	*/
	public function home($name){
		if(!$name) show_404();

		$this->load->model('user_model');
		if (intval($name)) {
			$uid = $name;
		} else{
			$uid = $this->user_model->get_by_username($name);
		}

		$uid = $this->user_model->get_by_username($name);

		if (!$uid) return show_404();

		$user_info = $this->user_model->get_by_uid($uid);

		//两者关注的关系
		$type = 0;
		if ($this->uid) $type = $this->user_model->is_relationr($this->uid, $uid);

		//该用户关注的人数
		$followering_num = count($this->user_model->get_by_uid_followers($uid));
		//该用户的粉丝数
		$follower_num = count($this->user_model->get_by_uid_for_followers($uid));


		$user_info['type'] = $type;
		$user_info['follower_num'] = $follower_num;
		$user_info['followering_num'] = $followering_num;

		$data = array('user_info' => $user_info);

		$this->load->view('people/home', $data);
	}

	/**
	*获取关注的人
	*@param name || uid
	*/
	public function on_focus($name){
		if(!$name) return false;

		$this->load->model('user_model');
		if (intval($name)) {
			$uid = $name;
		} else{
			$uid = $this->user_model->get_by_username($name);
		}

		if(!$uid){
			return false;
		}

		//获取用户关注的人
		$users_follower = $this->user_model->get_by_uid_followers($uid);

		$users = array();

		if ($users_follower) {
			foreach ($users_follower as $f_uid) {
				$f_userinfo = $this->user_model->get_by_uid($f_uid);
				//该用户和我的关系
				$type = 0;//默认两者无关系
				if ($this->uid) {
					$type = $this->user_model->is_relationr($this->uid, $f_uid);
				}
				$f_userinfo['type'] = $type;
				$users[] = $f_userinfo;
			}
		}

		var_dump($users);
	}

	/**
	*获取被关注的人
	*@param name || uid
	*/
	public function be_focus($name){
		if(!$name) return false;

		$this->load->model('user_model');
		if (intval($name)) {
			$uid = $name;
		} else {
			$uid = $this->user_model->get_by_username($name);
		}
	}
}
