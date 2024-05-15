<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends MY_Model {


    public static $_tbl = 'config';


    function __construct()
    {
        parent::__construct();

    }

    public static $_default_data = array(
        0   => array(
            'key'   => 'hotline',
            'name'  => 'Hotline',
            'value' => '+84 277 3910 397'
        ),
        1   => array(
            'key'   => 'address',
            'name'  => 'Địa chỉ',
            'value' => '62 Mã Mây, Hoàn Kiếm, Hà Nội'
        ),
        2   => array(
            'key'   => 'email',
            'name'  => 'Email',
            'value' => 'pixelteam58@gmail.com'
        ),
        3   => array(
            'key'   => 'facebook',
            'name'  => 'Facebook',
            'value' => ''
        ),
        4   => array(
            'key'   => 'instagram',
            'name'  => 'Instagram',
            'value' => ''
        ),
        5   => array(
            'key'   => 'pinterest',
            'name'  => 'Pinterest',
            'value' => ''
        ),
        6   => array(
            'key'   => 'twitter',
            'name'  => 'Twitter',
            'value' => ''
        ),
        7   => array(
            'key'   => 'link_app',
            'name'  => 'App',
            'value' => ''
        ),
        8   => array(
            'key'   => 'video',
            'name'  => 'Video',
            'value' => ''
        ),
        9   => array(
            'key'   => 'slogan',
            'name'  => 'Slogan',
            'value' => ''
        ),
    );

    public static function SelectAll()
    {
        $sql = "SELECT * FROM config";
        $rs = self::$db->query($sql)->result();
        return $rs;
    }

    public static function Filter($key,$page = 1, $limit = 20, &$total = 20)
    {
        $key = self::$db->escape_str($key);
        $name = "Filter" . $key .$limit .$total;
        $nameCount = "Count" . $key .$limit .$total;
        $ls   = self::limit_str($page, $limit);
        $where = '';
        if ($key)
        {

            $where = "WHERE name LIKE '%{$key}%'";


        }

        $sql = "SELECT * FROM config $where ORDER BY id".$ls;
        $count = "SELECT COUNT(id) AS total FROM config $where";
        $total = self::query_cache($nameCount, $count, TRUE)->total;
        $res = self::query_cache($name,$sql,FALSE);

        return $res;
    }

    public static function SelectByKey($key)
    {
        $key = self::$db->escape_str($key);
        $name = "SelectByKey".$key;
        $sql = "SELECT * FROM config WHERE `key` = '{$key}' ";
        $res = self::query_cache($name,$sql,TRUE);
        return $res;
    }

    public static function get_news($key = FALSE)
    {
        if ($key === FALSE)
        {
            $query = self::$db->get('config');
            return $query->result_array();
        }

        $query =  self::$db->get('config', 10);
        return $query->result_array();
    }

}
