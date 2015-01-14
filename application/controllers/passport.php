<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*login validation
*/
class Passport extends KC_Controller {
	public function index() {
		$this->login;
	}
	public function login() {
		$this->load->view('login');
	}
	public function login_ok() {
		$name = $this->input->get('name');
		$password = $this->input->get('password');

	}
}