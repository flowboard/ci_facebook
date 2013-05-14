<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'vendor/facebook-php-sdk/src/facebook.php';

class AFacebook extends Facebook
{

    protected function getSession()
    {
        $ci = & get_instance();
        $ci->load->library('session');
        return $ci->session;
    }

    protected static function startSession()
    {
        self::getSession();
        return TRUE;
    }

    protected static function getSessionId($id = FALSE)
    {
        return self::getSession()->userdata('session_id');
    }

    protected static function unsetSessionData($var)
    {
        self::getSession()->unset_userdata($var);
        return TRUE;
    }

    protected static function getSessionData($session_var_name)
    {
        $session_data = self::getSession()->userdata($session_var_name);
        return (isset($session_data)) ? self::getSession()->userdata($session_var_name) : NULL;
    }

    protected static function setSessionData($session_var_name, $value)
    {
        self::getSession()->set_userdata($session_var_name, $value);
        return TRUE;
    }

    protected static function getRequestVar($var)
    {
        parse_str($_SERVER['QUERY_STRING'], $_REQUEST);
        return (isset($_REQUEST[$var])) ? $_REQUEST[$var] : NULL;
    }

}
