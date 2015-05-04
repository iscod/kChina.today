<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***全局错误码***/
if(!defined('RESPONSE_OK')) define('RESPONSE_OK', 1);
if(!defined('RESPONSE_LOGIN')) define('RESPONSE_LOGIN', -1);
if(!defined('RESPONSE_PASS_ERROR')) define('RESPONSE_PASS_ERROR', -2);
if(!defined('RESPONSE_ERROR')) define('RESPONSE_ERROR', -3);



if(!function_exists('json_return')) {
	function json_return($return_code = RESPONSE_SYSTEM_BUSY, $msg = '', $data = array()){
		$response = array('result' => $return_code, 'msg' => $msg, 'data' => $data);
		return json_encode($response);
	}
}