<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends KC_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}

	public function index()
	{
		$this->load();
	}

	public function load() {

		$this->load->model('user_model');

		$user_info = $this->user_model->get_by_uid($this->uid);

		$page_info = array();
		$user_info = array();
		$data = array(
			'uid' => $this->uid,
			'user_info' => $user_info,
			'page_info' => $page_info,
			'user_info' => $user_info, 
			'server_id' => SERVERID
		);

		$this->load->view('welcome', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */