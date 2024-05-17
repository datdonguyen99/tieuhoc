<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchoolInfoModel extends MY_Model
{
    protected static $_tbl = 'school_info';
    public static $_field = array('name', 'slug', 'thumb', 'link', 'description');

    public function __construct()
    {
        parent::__construct();
    }


    // public static function SelectPage($page = 1, $limit = 20, &$total = 0)
    // {
    //     $name = 'SelectPage' . $page . $limit;
    //     $ls   = self::limit_str($page, $limit);
    //     $sql  = 'SELECT * FROM ' . static::$_tbl . ' ORDER BY sort_order ASC ' . $ls;
    //     $count = "SELECT COUNT(id) AS total FROM " . static::$_tbl . '';
    //     $total = self::query_cache('CountAllBanner', $count, TRUE)->total;
    //     return self::query_cache($name, $sql, FALSE);
    // }
}

/* End of file SchoolInfoModel.php */
