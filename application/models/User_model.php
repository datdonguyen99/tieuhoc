<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/4/2016
 * Time: 2:58 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{

    public static $_tbl  = 'users';
    public static $_role = array(
        '0'   	=> 'Sales',
        '1' 	=> 'Marketing',
        '3' 	=> 'Customer Service',
        '4' 	=> 'Administrator'
    );

    public static $_password_default = 'Admin@2017$';
    
    public function __construct()
    {
        parent::__construct();        
    }

    public static function GetAuthSession()
    {
    	$CI =& get_instance();
    	$res = $CI->session->userdata('userinfo'); 	
    	return $res;   		
    }

    public static function SetAuthSession($user_data)
    {
    	$CI =& get_instance();
    	$res = $CI->session->set_userdata('userinfo', (array) $user_data );    	
    }

    public static function CheckAuth($email, $password)
    {
    	$user  = self::SelectByEmail($email);
    	if (empty($user)){ return NULL; }

    	$is_success = password_verify($password, $user->password);

    	if ($is_success)
    	{
    		return $user;
    	}else{
    		return NULL;
    	}    		
    }

    public static function Insert($data)
    {
    	$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    	$id = parent::Insert($data);
    	return $id;    		
    }

    public static function Update($id, $data)
    {
    	if (!empty($data['password']))
    	{
    		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
    	}

    	parent::Update($id, $data);   	
    		
    }

    public static function GetRole($key)
    {
        return (empty(self::$_role[$key])) ? '': self::$_role[$key];
    }

    public static function SelectByUsername($username)
    {
        if (!is_string($username)){ return NULL; }
        $username = self::$db->escape_str($username);
        $name     = 'SelectByUsername'.$username;
        return self::query_cache($name, "SELECT * FROM users WHERE username = '$username' ");
    }

    public static function SelectByEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return NULL;
        }
        $email = self::$db->escape_str($email);
        $name  = 'SelectByEmail'.$email;
        $res   = self::query_cache($name, "SELECT * FROM users WHERE email = '{$email}' ");
        return $res;
    }   

    public static function CheckAdminRole($role)
	{
		$r = explode(',',$role);
		if(in_array('A',$r)){
			return true;
		}

		return false;
	}

}
