<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for user
*@author iscod
*/
class User_model extends CI_Model {
	
	private $mcache_key_uid = 'USERINFO_CACHE_BY_UID';
	private $mcache_key_username = 'USER_CACHE_BY_USERNAME';
	private $mcache_key_email = 'USER_CACHE_BY_EMAIL';

	/**
	*@param string $username
	*@return array $uid
	*/
	public function get_by_username($username, $cache = true) {

		if ($cache) {
			$uid = Mcache::read($this->mcache_key_username . $username);
			if ($uid) return $uid;
		}
		
		$this->load->database();
		$this->db->select('ID');
		$users = $this->db->get_where('users', array('user_login' => $username));

		if (!$users || $users->num_rows < 1) {
			return false;
		}

		$user = $users->row_array();

		$uid = $user['ID'];

		Mcache::write($this->mcache_key_username . $username, $uid);

		return $uid;
	}

	/**
	*@param string $email
	*@return $uid
	*/
	public function get_by_email($email, $cache = true) {
		if ($cache) {
			$uid = Mcache::read($this->mcache_key_email . $email);
			if ($uid) return $uid;
		}

		$this->load->database();
		$this->db->select('ID');
		$query = $this->db->get_where('users', array('user_email' => $email));

		if (!$query) {
			return false;
		}

		if ($query->num_rows() < 1) {
			return null;
		}

		$user = $query->row_array();

		$uid = $user['ID'];

		Mcache::write($this->mcache_key_email . $email, $uid);
		
		return $uid;
	}

	/**
	*@param int $uid
	*@param bool $cache=true
	*@return array||bool $userinfo||false
	*/
	public function get_by_uid($uid, $cache = true) {
		
		if (!$uid) {
			return false;
		}

		if ($cache) {
			$userinfo = Mcache::read($this->mcache_key_uid . $uid);
			if ($userinfo && is_array($userinfo)) {
				return $userinfo;
			}
		}

		Mcache::delete($this->mcache_key_uid . $uid);

		$this->load->database();
		$query = $this->db->get_where('users', array('ID' => $uid));

		if (!$query) {
			return false;
		}

		if ($query->num_rows() < 1) {
			return null;
		}

		$userinfo = $query->row_array();

		$userinfo['uid'] = $userinfo['ID'];

		unset($userinfo['ID']);

		Mcache::write($this->mcache_key_uid . $uid, $userinfo);

		return $userinfo;

	}
}