<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends KC_Controller {
	public function __construct()
	{
		parent::__construct();
  		$this->load->helper(array('form', 'url'));
	}

	/**
	*book index
	*/
	public function index(){
		$data = array();
		$this->load->view('book/index', $data);
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
		$this->load->view('book/book', $data);
	}
	/**
	*up book
	*@author Iscod
	*/
	public function up() {
		$this->load->view('book/up');
	}
	public function upload_form() {
		$this->load->view('/book/upload_form');
	}

	/**
	*up book submit
	*@author Iscod
	*@param post[]
	*@return book_id|false
	*@
	*/
	public function up_submit() {

		if (!$this->uid) {
			$this->load->view('/book/upload_form');
			echo json_return(RESPONSE_ERROR, '您还没有登录哦！');
			return false;
		}

		$book_title = $this->input->post('book_title');
		$book_author = $this->input->post('book_author');
		$book_commend = $this->input->post('book_commend');
		$book_time = $this->input->post('book_time');//出版时间

		if (!$book_title) {
			echo json_return(RESPONSE_ERROR, '亲，书名不能不填写哦！');
			return false;
		}

		if (!$book_author) {
			echo json_return(RESPONSE_ERROR, '亲，作者填写一下吧！');
			return false;
		}

		if (!$book_commend) {
			echo json_return(RESPONSE_ERROR, '亲，简单的介绍写一下吧！');
			return false;
		}

		$config['upload_path'] = './books/';
		$config['allowed_types'] = 'txt';
		$config['max_size'] = '10240';
		$config['file_name'] = 'upnewbook.txt';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			// $this->db->delete('book', array('book_id' => $book_id));
			$data = array(
				'book_title' => $book_title,
				'book_author' => $book_author,
				'book_commend' => $book_commend,
				'book_time' => $book_time,
			);
			// $error = array('error' => $this->upload->display_errors());
			// $this->load->view('book/up', $data);

			echo json_return(RESPONSE_ERROR, '上传失败', $data);
			return false;
		} 
		else
		{
			$data = array(
				'uid' => $this->uid,
	        	'book_title' => $book_title,
	        	'book_author' => $book_author,
	        	'book_commend' => $book_commend,
	        );
	        if(intval($book_time) > 0) {
	        	$data['book_time'] = $book_time;
	        }

	        $this->load->database('book');
			$query = $this->db->insert('book', $data);

			if (!$query) {
				echo json_return(RESPONSE_ERROR, '上传失败', $book);
				return false;
			}
			$book_id = $this->db->insert_id();

			$book_file = $config['upload_path'] . $config['file_name'];
			$book_move_file = $config['upload_path'] . $book_id . '.txt';
			@unlink($book_file);
			@unlink($book_file_new);
			var_dump($book_file);
			var_dump($book_move_file);
			if (!@move_uploaded_file($book_file, $book_move_file)) {
				echo json_return(RESPONSE_ERROR, '文本上传失败');
				return false;
			}

			$book_id = $max_id;
			echo json_return(RESPONSE_OK, '上传成功', $book_id);
			return true;
			// // var_dump($query);
			// $data = $this->upload->data();
			// $this->info($book_id);
			// return true;
		}

		echo json_return(RESPONSE_OK, '上传成功', $book);

	}
}