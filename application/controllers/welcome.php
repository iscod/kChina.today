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
		parent::__construct(FALSE, FALSE);
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

		$load_book = $this->_load_book();

		$data = array(
			'uid' => $this->uid,
			'user_info' => $user_info,
			'page_info' => $page_info,
			'user_info' => $user_info,
			'load_book' => $load_book,
			'server_id' => SERVERID
		);

		$this->load->view('welcome', $data);
	}

	private function _load_book() {
		$load_book = array();

		$book_config = dbclass::book();
		$db = $this->load->database($book_config['dsn'], true);

		$heat_book_sql = "SELECT * FROM kc_book WHERE 1";
		$heat_book = $db->query($heat_book_sql);
		$heat_book = $heat_book->result_array();

		$load_book = array();

		//新书
		$new_book = array();
		foreach ($heat_book as $key => $book) {
			
			//出版时间处理
			if (!strtotime($book['book_time'])) {
				$heat_book[$key]['book_time'] = '出版时间不详';
			}

			//热度调整
			$level = $book['kc_level'] * 0.5 + $book['book_heat'] * 0.5;
			$heat_book[$key]['level'] = $level;

			//新书推荐
			if (time() - strtotime($book['book_registered']) < 86400*7 && $book['book_heat'] > 9) {
				$new_book['book_id'] = $book['book_id'];
				$new_book['heat'] = $book['book_heat'];
			}
			$heat_book[$key]['book_cover'] = '/image/book/cover/' . md5($book['book_id']) . '.jpg';
			

		}

		//分类查询
		if (!Mcache::read('MCACHE_BOOK_TERMS')) {
			$term = $db->get('kc_book_terms');
			if (is_object($term) && !$term && $term->num_rows() >0) {
				$term = $term->result_array();
				Mcache::write('MCACHE_BOOK_TERMS', $term, 86400);
			}
		}
		$term = Mcache::read('MCACHE_BOOK_TERMS');

		Mcache::write('MCACACHE_BOOK_LIST', $heat_book);
		Mcache::write('MCACHE_NEW_BOOK_LIST', $new_book);
		$load_book['term'] = $term;
		$load_book['new_book'] = $new_book;
		$load_book['books'] = $heat_book;
		return $load_book;
	}

	public function _load_travel() {
		$data = array();
		return $data;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
