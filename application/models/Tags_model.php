<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 8:55 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Tags_model extends MY_Model
{
    public static $_tbl = 'tags';
    public static  $_type = array('post', 'game');


    public function __construct()
    {
        parent::__construct();
    }

    public static function SelectByObjectIdType($ob_id, $object_type = 'news')
    {

        $name   = 'SelectByObjectId'.$ob_id . $object_type;
        $sql = "SELECT * FROM tags t INNER JOIN keywords k  ON t.keyword_id = k.id 
        		WHERE object_id = '$ob_id' /*AND object_type = '{$object_type}'*/ ";
        return self::query_cache($name, $sql, FALSE);
    }

}