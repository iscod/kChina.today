<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*sql for kc
*sql validation
*/

class Dbclass {
	/**
	* sql for name
	* @var string
	*/
	public static $user = 'kChina';

	/**
	* sql for pass
	* @var string
	*/

	public static $pwd = 'kChinapassword';

	/**
	* sql for posrt
	*/

	public static $port = '3306';

	public static $database = 'kchina';

	/**
	*配置user 为以后分表预留
	*/
	public static $user_host = array('host'=>'127.0.0.1', 'port'=>'3306', 'user'=>'kChina', 'pwd'=>'kChinapassword');

	/**
	*配置book 为以后分表预留
	*/
	public static $book_host = array('host'=>'127.0.0.1', 'port'=>'3306', 'user'=>'kChina', 'pwd'=>'kChinapassword');


	public static function user($uid) {
		$host_config = self::$user_host;

		if (!isset($host_config['user'])) $host_config['user'] = self::$user;
		if (!isset($host_config['pwd'])) $host_config['pwd'] = self::$pwd;
		if (!isset($host_config['port'])) $host_config['port'] = self::$port;
		if (!isset($host_config['database'])) $host_config['database'] = self::$database;

		$host_config['table'] = 'kc_users';

		$server = $host_config;

		$server['dsn'] = 'mysql://' . $host_config['user'] . ':' . $host_config['pwd'] . '@' . $host_config['host'] . '/' . $host_config['database'] . '?port=' . $host_config['port'];
		return $server;
	}
	public static function usersinfo($uid) {
		$host_config = self::$user_host;

		if (!isset($host_config['user'])) $host_config['user'] = self::$user;
		if (!isset($host_config['pwd'])) $host_config['pwd'] = self::$pwd;
		if (!isset($host_config['port'])) $host_config['port'] = self::$port;
		if (!isset($host_config['database'])) $host_config['database'] = self::$database;

		$host_config['table'] = 'kc_usersinfo';

		$server = $host_config;

		$server['dsn'] = 'mysql://' . $host_config['user'] . ':' . $host_config['pwd'] . '@' . $host_config['host'] . '/' . $host_config['database'] . '?port=' . $host_config['port'];
		return $server;
	}

	public static function userfollwer($uid){
		$host_config = self::$user_host;

		if (!isset($host_config['user'])) $host_config['user'] = self::$user;
		if (!isset($host_config['pwd'])) $host_config['pwd'] = self::$pwd;
		if (!isset($host_config['port'])) $host_config['port'] = self::$port;
		if (!isset($host_config['database'])) $host_config['database'] = self::$database;

		$host_config['table'] = 'kc_usersfollwers';

		$server = $host_config;

		$server['dsn'] = 'mysql://' . $host_config['user'] . ':' . $host_config['pwd'] . '@' . $host_config['host'] . '/' . $host_config['database'] . '?port=' . $host_config['port'];
		return $server;
	}


	public static function book($boodid = false) {
		$host_config = self::$book_host;

		$host_config['database'] = 'kc_book';

		if (!isset($host_config['user'])) $host_config['user'] = self::$user;
		if (!isset($host_config['pwd'])) $host_config['pwd'] = self::$pwd;
		if (!isset($host_config['port'])) $host_config['port'] = self::$port;
		if (!isset($host_config['database'])) $host_config['database'] = self::$database;

		$server = $host_config;

		$server['dsn'] = 'mysql://' . $host_config['user'] . ':' . $host_config['pwd'] . '@' . $host_config['host'] . '/' . $host_config['database'] . '?port=' . $host_config['port'];
		return $server;
	}

}