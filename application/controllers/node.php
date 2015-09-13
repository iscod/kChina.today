<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Node extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);

	}
	/**
	*关注等动作处理
	*/

	public function focus(){
		$method = $this->input->post('medthod');
		$follwerid = $this->input->post('follwerid');

		$this->load->model('user_model');

		if ($method == 'follow') {
			$this->user_model->set_follsers($this->uid, $follwerid);
		}

		if ($medthod == 'unfollow') {
			$this->user_model->un_follsers($this->uid, $follwerid);
		}

		// $db = $this->
	}

	/*
	*关注用户功能
	*关注或取消
	*/
	public function set_follow(){
		if (!$this->uid) {
			echo json_return(RESPONSE_UN_LOGIN, '请登陆');
			return false;
		}

		$f_uid = (int)$this->input->post('uid');
		$follow = (int)$this->input->post('follow');

		if (!$f_uid) {
			echo json_return(RESPONSE_ERROR, '数据错误');
			return false;
		}

		if (!in_array($follow, array(0,1))) {
			echo json_return(RESPONSE_ERROR, '数据错误');
			return false;
		}

		$this->load->model('user_model');

		$f_user = $this->user_model->get_by_uid($f_uid);

		if (!$f_user) {
			echo json_return(RESPONSE_ERROR, '数据错误');
			return false;
		}

		if ($follow == 1) {
			$set = $this->user_model->set_follower($this->uid, $f_uid);
			if (!$set) {
				echo json_return(RESPONSE_ERROR, '网络错误');
				return false;
			}
		}

		if ($follow == 0) {
			$set = $this->user_model->un_follower($this->uid, $f_uid);
			if (!$set) {
				echo json_return(RESPONSE_ERROR, '网络错误');
				return false;
			}
		}

		echo json_return(RESPONSE_OK, 'ok');
		return true;
	}
	/**
	*用户关注book功能
	*关注或取消
	*/
	public function set_book_focus(){
		if (!$this->uid) {
			echo json_return(RESPONSE_UNKNOWN_ERROR, '请登陆');
			return false;
		}

		$bookid = $this->input->post('bookid');
		$follow = (int)$this->input->post('follow');

		echo json_return(RESPONSE_OK, 'ok');
		return true;
	}
}