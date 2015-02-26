<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for user
*@author iscod
*/
class User_model extends CI_Model {
	
	/**
	*@param string $username
	*@return array $uid
	*/
	public function get_by_username($username) {

		$uid = Mcache::read('USER_BY_USERNAME_'.$username);
		if ($uid) return $uid;

		$this->load->database();
		$users = $this->db->get_where('users', array('user_login' => $username));

		if (!$users || $users->num_rows < 1) {
			return false;
		}

		$user = $users->row_array();
		
		$uid = $user['ID'];

		Mcache::write('USER_BY_USERNAME_'.$username, $uid);

		return $uid;
	}

	/**
	*@param string $email
	*@return $uid
	*/
	public function get_by_email($email) {
		
	}

	/**
	*@param int $uid
	*@return array||bool $userinfo||false
	*/
	public function get_by_uid($uid) {
		$userinfo = Mcache::read('USER_BY_UID_'.$uid);
		if ($userinfo && is_array($userinfo)) return $userinfo;

		$this->load->database();
		$query = $this->db->get_where('users', array('ID' => $uid));

		if (!$query || $query->num_rows < 1) {
			return false;
		}

		$userinfo = $query->row_array();

		$userinfo['uid'] = $userinfo['ID'];

		unset($userinfo['ID']);

		Mcache::write('USER_BY_UID_'.$uid, $userinfo);

		return $userinfo;

	}
}