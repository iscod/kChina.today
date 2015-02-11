<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*mcache for kc
*memcache validation
*/

class Mcache {

	protected static $_macache = null;

	/*
	*localhost
	*/

	protected static $dev_host = array(
		'1' => array(
			array('host' => '127.0.0.1', 'port' =>'11211')
		)
	);

	/*
	*server
	*/

	protected static $main_host = array(
		'1' => array(
			array('host' => '127.0.0.1', 'port' =>'11211')
		)
	);


	protected function _connect() {
		
		if (self::$_macache !== null) return self::$_macache;

		self::$_macache = new Memcache;

		$server = ENVIRONMENT == 'development' ? self::$dev_host[SERVERID] : self::$main_host[SERVERID];

		foreach ($server as $host) {
			self::$_macache->addServer($host['host'], $host['port']);
		}

		return self::$_macache;
	}
	
	/**
	*write
	*@param string $sql|$key
	*@return bool true||false
	*/


	public static function write($key, $val, $expire = false) {

		$macache = self::_connect();
		if ($macache == null) return false;

		$key = md5($key);

		if ($expire) return $macache->set($key, $val, $expire);

		return $macache->set($key, $val);
		

	}

	/**
	*read
	*@param string $sql|$key
	*@return 
	*/

	public static function read($key) {
		$macache = self::_connect();
		if ($macache == null) return false;

		$key = md5($key);
		return $macache->get($key);
	}

	/**
	*delete
	*@param string $key
	*@param int time()
	*@return bool true||false
	*/

	public static function delete($key ,$outtime = 0) {
		$macache = self::_connect();
		if ($macache == null) return false;

		$key = md5($key);
		return $macache->delete($key, $outtime);
	}

}