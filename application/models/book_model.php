<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for model
*@author IsCod
*/

class Book_model extends CI_Model {

	private $mcache_book_relat = "MCACHE_KC_BOOK_RELAT";
	private $mcache_book_terms = "MCACHE_KC_BOOK_TERMS";
	private $macache_key_bookid = "MCACHE_KC_BY_BOOK_ID";
	private $mcache_key_book_recommend = 'MCACHE_KC_BOOK_RECOMMEND';
	private $mcache_book_bookfocus = 'MCACHE_KC_BOOK_FOCUS';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	*@param $book_id
	*@return true|false
	*/
	public function is_bookid($book_id) {
		$result = $this->get_by_bookid($book_id);
		return ($result);
	}

	/**
	*get book new
	*获取书的信息
	*@param $book_id
	*@return array|false
	*/
	public function get_by_bookid($book_id) {

		if (Mcache::read($this->macache_key_bookid . $book_id) !== false) {
			return Mcache::read($this->macache_key_bookid . $book_id);
		}

		$book_config = dbclass::book($book_id);
		$db = $this->load->database($book_config['dsn'], true);

		$query = $db->get_where('kc_book', array('book_id'=>$book_id));

		if (!is_object($query) || !$query || $query->num_rows()<1 ) return false;

		$book = $query->row_array();
		if ($book) {
			$book['book_cover'] = '/image/book/cover/' . md5($book['book_id']) . '.jpg';

			$relat = $this->get_book_relat($book_id);

			$book['term_id'] = isset($relat['term_id']) ? $relat['term_id'] : null;

			$term = $this->get_terms($book['term_id']);

			$book['term_name'] = isset($term['name']) ? $term['name'] : null;
		}

		Mcache::write($this->macache_key_bookid . $book_id, $book);
		return $book;
	}

	/**
	*get book relat
	*获取书的分类id
	*@param $book_id
	*@return array|false
	*/
	public function get_book_relat($book_id) {
		if (Mcache::read($this->mcache_book_relat . $book_id) !== false) {
			return Mcache::read($this->mcache_book_relat . $book_id);
		}

		$bookrelat_config = dbclass::bookrelat($book_id);

		$db = $this->load->database($bookrelat_config['dsn'], true);

		$query = $db->get_where($bookrelat_config['table'], array('book_id'=> $book_id));

		$bookrelat = $query->row_array();

		Mcache::write($this->mcache_book_relat . $book_id, $bookrelat);
		return $bookrelat;

	}

	/**
	*set or update book relat
	*设置或更细书的分类id
	*@param $book_id
	*@param $term_id
	*/
	public function set_book_relat($book_id, $term_id){
		//是否已经分类
		$is_relat = $this->get_book_relat($book_id);

		$bookrelat_config = dbclass::bookrelat($book_id);
		$db = $this->load->database($bookrelat_config['dsn'], true);

		if ($is_relat) {
			if ($is_relat['term_id'] != $term_id) {
				$update = $db->update($bookrelat_config['table'], array('term_id' => $term_id), array('book_id'=> $book_id));
				if (!$update) return false;
			}
		}else{
			$insert = $db->insert($bookrelat_config['table'], array('book_id'=> $book_id, 'term_id' => $term_id));
			if (!$insert) return false;
		}

		Mcache::delete($this->mcache_book_relat . $book_id);
		return true;
	}

	/**
	*get book trems
	*获取分类信息
	*@param $tremid
	*@return array|false
	*/

	public function get_terms($term_id) {
		if (Mcache::read($this->mcache_book_terms . $term_id) !== false) {
			return Mcache::read($this->mcache_book_terms . $term_id);
		}

		$bookterm_config = dbclass::bookterm($term_id);

		$db = $this->load->database($bookterm_config['dsn'], true);

		$query_term = $db->get_where($bookterm_config['table'], array('term_id' => $term_id));

		$term = $query_term->row_array();

		Mcache::write($this->mcache_book_terms . $term_id, $term);
		return $term;
	}

	/**
	*get book recommend
	* @return array $books
	*/
	public function get_book_recommend($cache = true) {
		if ($cache && Mcache::read($this->mcache_key_book_recommend) !== false) {
			return Mcache::read($this->mcache_key_book_recommend);
		}

		$book_config = dbclass::book();
		$db = $this->load->database($book_config['dsn'], true);

		$query = $db->get($book_config['table']);

		if (!is_object($query) || !$query) return false;

		$books = $query->result_array();

		$book_commends = array();

		foreach ($books as $book) {
			$book_commends[] = $book;
		}

		Mcache::write($this->mcache_key_book_recommend, $book_commends);
		return $book_commends;
	}

	/**
	*get book focus
	*获取关注该书的用户
	*/
	public function get_bookfocus($book_id){
		if (Mcache::read($this->mcache_book_bookfocus . $book_id) !== false) {
			return Mcache::read($this->mcache_book_bookfocus . $book_id);
		}

		$bookfocus_config = dbclass::bookfocus();
		$db = $this->load->database($bookfocus_config['dsn'], true);
		$query = $db->get_where($bookfocus_config['table'], array('bookid'=>$book_id));

		$bookfocus = $query->result_array();

		Mcache::write($this->mcache_book_bookfocus . $book_id, $bookfocus);
		return $bookfocus;
	}
}