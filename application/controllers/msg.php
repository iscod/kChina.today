<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for kc msg
*@author iscod
*@timer 2015-2-13
*/

class Msg extends KC_Controller {

	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}

	public function chat_room(){
		echo 'xxx';
		if (!$this->uid) {
			die('not login');
		}

		$this->load->model('user_model');
		$user_info = $this->user_model->get_by_uid($this->uid);

		if (isset($user_info['user_nickname'])) {
			$user_info['user_nickname'] = $user_info['user_login'];
		}

		var_dump($user_info);

		// $user_pass = $this->user_model->get_pass_by_uid;

		// var_dump($user_pass);

		// $redis = Rcache::init();
		// $redis->lPushx('caht_room_list', $this->uid);
		// $data = array(
		// 	'uid' => $this->uid,
		// 	'nick_name' => $user_info['user_nickname'],
		// );

	}
}