<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

class Wap_model extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(false, false);
    }

        //judge is weinxin
    public function is_WinXin(){
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') != false) {
            return true;
        }
        
        return false;
    }

    //judge is mobile
    public function is_Mobile() {
        if (isset($_SERVER["HTTP_x_WAP_PROFILE"])) {
            return true;
        }
        //VIA have 'wap' is Mobile
        if (isset ($_SERVER['HTTP_VIA'])) {
            return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
        }

        if (isset ($_SERVER['HTTP_CLIENT']) && 'phoneCline' == $_SERVER['HTTP_CLIENT']) {
            return true;
        }

        //mark for mobile
        if (isset ($_SERVER['HTTP_USER_AGENT'])) {
            $client_key_words = array(
                'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
            );
            
            if (preg_match("/" . implode('|', $client_key_words) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
                return true;
            }
        }

        //agreement , 
        if (isset ($_SERVER['HTTP_ACCEPT'])) {
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html') ) )) {
                return true;
            }
        }

        return false;
    }
}