<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Traver extends KC_Controller {
	public function __construct()
	{
		parent::__construct();
  		$this->load->helper(array('form', 'url'));
	}

	/**
	*book index
	*/
	public function index(){
		$query = array(
			0 => array('traverid'=>1),
			1 => array('traverid'=>2)
		);
		foreach ($query as $key => $value) {
			$traver = array(
				'traver_id' => $value['traverid'],
			);
			$travers[] = $traver;
		}
		$data = array(
			'travers' => $travers
		);
		$this->load->view('traver/index', $data);
	}
}