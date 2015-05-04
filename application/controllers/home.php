<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends KC_Controller {
	public function __construct()
	{
		parent::__construct(FALSE, FALSE);
	}

	public function my($uid) {

		$uid = intval($uid);
		if (!$uid) return false;

		var_dump($uid);

	}
}