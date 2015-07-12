<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tmp extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}
	public function index() {

		$this->load->view('tmp');

	}

public function authcode() {
		header('Content-type: image/pjpeg');
		header("Expires: Sun, 1 Jan 2000 12:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$this->load->library('secureimage_lib');
		if(!session_id()) session_start();
		$_SESSION['login_autocode'] = strtolower($this->secureimage_lib->code);
		echo $this->secureimage_lib->image_stream;
	}
}