<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Tmp extends KC_Controller {
	public function __construct()
	{
		parent::__construct(TRUE, FALSE);
	}

	public function x(){
		$arr = array(2);

		$arr = serialize($arr);
		// var_dump($arr);
		// var_dump(unserialize($arr));
		
		$this->load->model('user_model');

		// $x = $this->user_model->get_by_uid_follwers(1);
		// var_dump($x);

		// $query = $this->user_model->set_follower(3,1);
		// $query = $this->user_model->set_follower(1,3);
		$query = $this->user_model->is_relationr(1,1);

		var_dump($query);


		// $set = $this->user_model->set_follsers(1, 2);
		// var_dump($set);
		// if ($set) echo 'ok';

		$act_time = date('Y-m-d H:i:s');

		if ($act_time > "2015-09-10 00:00:00") {
			echo 'this is ok';
		}else{
			echo 'ok' + 'ksks';
		}
echo 'ok' . 'ksks';
	}

	public function get_bookfocus(){
		// $this->load->model('user_model');
		// $books = $this->user_model->get_by_uid_bookfocus($this->uid);

		$this->load->model('book_model');
		$books = $this->book_model->get_book_relat(3);


		var_dump($books);
	}

}