<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*rechece for kc
*Rrcache validation
*/

class Rcache {

    /**
    * 连接
    *
    *@var object|null
    */
    protected static $_conn = null;

    /**
    * localhost
    *
    *@var array
    */
    protected static $dev_host = array(
        1 => array('host' => 'localhost', 'port' => '6379'),
    );

    /**
    *server
    *
    *@var array
    */
    protected static $main_host = array(
        1 => array('host' => 'localhost', 'port'=>'6379'),
    );

	/**
	*初始化
	*@return object
	*/
	public static function init(){

		$server = ENVIRONMENT == 'development' ? self::$dev_host[SERVERID] : self::$main_host[SERVERID];

		self::$_conn = new Redis();

		$conn_status = self::$_conn->connect($server['host'], $server['port']);

		if (!$conn_status) {
		 	self::$_conn->connect($server['host'], $server['port']);
		 }

		 self::$_conn->select(2);

		 return self::$_conn;

	}

    /**
     * 手动关闭连接
     */
    public static function close()
    {
    	if (is_object(self::$_conn)) self::$_conn->close();

    	self::$_conn = null;
	}
}