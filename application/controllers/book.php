<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BOOK extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}

	/**
	*for book
	*@author IsCod
	*/
	public function info($bookid){
		$bookid = intval($bookid);
		$this->load->model('book_model');
		$book_info = $this->book_model->get_by_bookid($bookid);
		$data = array(
			'bookid' => $bookid,
			'book_info' => $book_info,
		);
		$this->load->view('book', $data);
	}
}