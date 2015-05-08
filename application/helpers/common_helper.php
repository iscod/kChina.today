<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*这里定义全局函数
*@author iscod
*@time 20150506
*/


/**
*随机生成字符串
*@param int $num
*@return string
*/
function get_rand_str($num = 6) {
	$word = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

	$string = '';
	$word_len = strlen($word) - 1;

	for ($i=0; $i < $num; $i++) {
		$key = mt_rand(0, $word_len); 
		$string .= $word[$key];
	}

	return $string;
}

/**
*email for kc
*@param string $toemail html content ,$subject 
*/

// function send_email($to_email, $content, $subject, $from_email='ascoon@163.com', $form_name='KC!'){
// 		$this->load->library('email');
// 		$this->email->clear();
// 		$this->email->from('ascoon@163.com', 'KC');
// 		$this->email->to($email);
// 		$this->email->subject('加入KC，和我们一起探讨世界');
// 		$code_url = "http://" . HOST_DOMAIN . "/login/register_code?email".md5($email)."&code=".$val_key."&time=".time();
// 		$content = "
// 			加入KC，和我们一起探讨世界，你需要到该地址进行验证，可不要被问题卡住哦！<br/>
// 			{unwrap}<a href='".$code_url."'>".$code_url."</a>{/unwrap}
// 		";
// 		$emial_return = send_email($to_email, $content,)
// 		$this->email->message($email, $content);
// 		$return = $this->email->send();

// 		return $return;
// }
