<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Recaptcha
{
	private static $site_key   = '6LejzasUAAAAALvqMeCA43Ys6it7o5lq8lgFz8gR',//'6LeCYU4UAAAAAPWaxuNzG4uI_HpYYUKvnGi9nJqO',
			$secret_key = '6LejzasUAAAAAAphxBawpdeHxVxwTV_KrnfPYXMY';//'6LfPYk4UAAAAABOcu92jx6ul1bHgEca4AnROkTTM';
    function __construct()
    {
        
    }

    public static function verify()
    {
    	$url = 'https://www.google.com/recaptcha/api/siteverify';    	
        $response = get_instance()->input->post('g-recaptcha-response');
        if (empty($response))
        {
            return FALSE;
        }

    	$param = array(
    		'secret' 	=> self::$secret_key,
    		'response'  => $response,
    		'remoteip'  => $_SERVER['REMOTE_ADDR']
    	);

    	$field = http_build_query($param);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$field);

        $result = curl_exec($ch);
        $res 	= json_decode($result);
        return $res->success;

    }
    public static function my_verify($str)
    {
    	$url = 'https://www.google.com/recaptcha/api/siteverify';    	
        $response = $str;
        if (empty($response))
        {
            return FALSE;
        }

    	$param = array(
    		'secret' 	=> self::$secret_key,
    		'response'  => $response,
    		'remoteip'  => $_SERVER['REMOTE_ADDR']
    	);

    	$field = http_build_query($param);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$field);

        $result = curl_exec($ch);
        $res 	= json_decode($result);
        return $res->success;

    }

}

/*
-- Html

<div class="g-recaptcha" data-sitekey="6LfDcgcTAAAAAMLZpczxtTL-f7rMvF7qBJYwyb0O"></div>

<script src='https://www.google.com/recaptcha/api.js?hl=vi'  async defer></script>

response.success | TRUE or FALSE
grecaptcha.reset();


*/