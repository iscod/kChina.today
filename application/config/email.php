<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*set email for kc
*2015-5-6
* useragent	CodeIgniter	无	用户代理 "user agent"。
* protocol	mail	mail, sendmail, or smtp	邮件发送协议。
* mailpath	/usr/sbin/sendmail	无	服务器上 Sendmail 的实际路径。protocol 为 sendmail 时使用。
* smtp_host	无默认值	无	SMTP 服务器地址。
* smtp_user	无默认值	无	SMTP 用户账号。
* smtp_pass	无默认值	无	SMTP 密码。
* smtp_port	25	无	SMTP 端口。
* smtp_timeout	5	无	SMTP 超时设置(单位：秒)。
* wordwrap	TRUE	TRUE 或 FALSE (布尔值)	开启自动换行。
* wrapchars	76		自动换行时每行的最大字符数。
* mailtype	text	text 或 html	邮件类型。发送 HTML 邮件比如是完整的网页。请确认网页中是否有相对路径的链接和图片地址，它们在邮件中不能正确显示。
* charset	utf-8		字符集(utf-8, iso-8859-1 等)。
* validate	FALSE	TRUE 或 FALSE (布尔值)	是否验证邮件地址。
* priority	3	1, 2, 3, 4, 5	Email 优先级. 1 = 最高. 5 = 最低. 3 = 正常.
* crlf	\n	"\r\n" or "\n" or "\r"	换行符. (使用 "\r\n" to 以遵守RFC 822).
* newline	\n	"\r\n" or "\n" or "\r"	换行符. (使用 "\r\n" to 以遵守RFC 822).
* bcc_batch_mode	FALSE	TRUE or FALSE (boolean)	启用批量暗送模式.
* bcc_batch_size
*/

// $config['protocol'] = 'sendmail';
// $config['mailpath'] = '/usr/sbin/sendmail';
// $config['charset'] = 'iso-8859-1';
// $config['wordwrap'] = TRUE;

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.163.com';
$config['smtp_user'] = 'ascoon@163.com';
$config['smtp_pass'] = 'ntl545937.';
$config['smtp_port'] = '25';
$config['smtp_timeout'] = '10';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
$config['validate'] = TRUE;
$config['priority'] = 1;
$config['crlf'] = "/r/n";
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';
// $config[''] = '';




