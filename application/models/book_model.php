<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*for model
*@author IsCod
*/

class Book_model extends CI_Model {


	private $mcache_book_relat = "MCACHE_KC_BOOK_RELAT";
	private $mcache_book_trems = "MCACHE_KC_BOOK_TERMS";
	private $macacge_key_bookid = "MCACHE_KC_BY_BOOK_ID";

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
	*get book relat
	*@param $book_id
	*@return array|false
	*/
	public function book_relat($book_id) {
		if (Mcache::read($this->mcache_book_relat.$book_id)) {
			$trem_id =  Mcache::read($this->mcache_book_relat.$book_id);

			$trem_name = $this->get_trems($tremid);

			$data = array(
				'tremid' => $trem_id,
				'trem_name' => $trem_id
			);
		}
	}

	/**
	*get book trems
	*@param $tremid
	*@return array|false
	*/

	public function get_trems($tremid) {
		if (Mcache::read($this->mcache_book_trems.$tremid)) {
			$trem_name = Mcache::read($this->mcache_book_trems.$tremid);
			return $trem_name;
		}

		$this->load->database('book');
		$query_trem = $this->db->get_where('book_trems', array('tremid' => $trem_id));

		if (!$query_trem || $query_trem->row_array() < 1) {
			return false;
		}

		$trem_name = $query_trem->row_array;
		$name = $trem_id['name'];

		Mcache::write($mcache_book_trems.$tremid, $trem_name, $name);
		return $name;
	}

	/**
	*get book trems
	*@param $book_id
	*@return array|false
	*/
	// public function get_book_info($book_id) {
	// 	if (!$book_id) return false;

	// 	if (!$this->is_bookid($book_id)) return false;

	// 	$data = $this->get_by_bookid($book_id);
	// 	$data['tremid'] = $this->get_trems($book_id);
	// 	$data['trem_name'] = ;

	// }

	public function get_by_bookid($book_id) {

		// $cache = Mcache::read($this->macacge_key_bookid.$book_id);
		// if (is_array($cache)) {
		// 	return $cache;
		// }

		$this->load->database('book');
		$query = $this->db->get_where('book', array('book_id'=>$book_id));

		if (!is_object($query) || !$query || $query->row_array()<1 ) return false;

		$book = $query->row_array();
		$book['book_cover'] = '/image/book/cover/' . md5($book['book_id']) . '.jpg';

		$query_trem = $this->db->get_where('book_relat', array('book_id' => $book_id));

		$trem = $query_trem->row_array();

		if (!empty($trem['trem_id'])) {
			$book['trem_id'] = $trem['trem_id'];
			$book['trem_name'] = $this->get_trems_name($trem['trem_id']);
		}

		Mcache::write($this->macacge_key_bookid.$book_id, $book);
		return $book;
	}

}