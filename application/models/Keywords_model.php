<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 8:55 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Keywords_model extends MY_Model
{
    public static $_tbl = 'keywords';
    public static  $_type = array('post', 'game');


    public function __construct()
    {
        parent::__construct();
    }

    public static function CountPostByKeywordId($id)
    {
    	$id = (int) $id;
    	$sql = "SELECT COUNT(*) as total FROM tags WHERE keyword_id = {$id} ";
    	return self::$db->query($sql)->row()->total;    		
    }


    public static function SelectTagsKeyword($key = '' , $page, $limit, &$total)
    {
    	$limit_str 	= self::limit_str($page, $limit);

    	$where = '';

    	if (!empty($key))
    	{
    		$where = " WHERE k.slug like '%{$key}%' ";
    	}

    	$sql = "SELECT * FROM keywords k 
				INNER JOIN (
				SELECT keyword_id, COUNT(object_id) as total_post 
				FROM tags group by keyword_id
				) as t ON k.id = t.keyword_id 
				$where
				ORDER BY total_post DESC  ". $limit_str ;

		$sql_count = "SELECT COUNT(*) as total FROM keywords k " . $where;

		

		$total = self::$db->query($sql_count)->row()->total;

		return self::$db->query($sql)->result();
    		
    }

    public static function SelectPostByKey($id, $object_type = 'news', &$total_row = 0 , $page = 1, $limit = 25)
    {
    	$id = (int) $id;
        $limit_str 	= self::limit_str($page, $limit);

        $name   = 'SelectPostByKey'.$id . $page;
        $sql 	= "SELECT p.* FROM posts p 
        		   INNER JOIN tags t ON p.id = t.object_id 
        		   INNER JOIN keywords k ON k.id= t.keyword_id
        		   WHERE t.keyword_id = {$id} AND t.object_type = '{$object_type}' " ;

       	$sql_count = "SELECT COUNT(*) as total FROM tags 
       				WHERE keyword_id = {$id} AND object_type= '{$object_type}' GROUP BY object_id ";

       	$total_row = (int) self::query_cache('SelectPostByKey_Total'.$id, $sql_count)->total;

        return self::query_cache($name, $sql , FALSE);
    }
    public static  function SelectBySlug($slug)
    {
        $slug   = self::$db->escape_str($slug);
        $name   = 'SelectBySlug'.$slug;
        return self::query_cache($name, "SELECT *  FROM keywords WHERE slug = '$slug'",TRUE);
    }
    public static  function SelectAll()
    {

        $sql = "SELECT * FROM keywords   ORDER BY id DESC ";
        $res = self::$db->query($sql)->result();
        return $res;
    }
    public static  function Get_link($tag)
    {
        return "/tu-khoa/$tag";
    }
    public static function SelectByKeyWord($key)
    {
        $q = trim($key);
        $name = 'SelectByKeyWord'.$q;
        $sql = "SELECT id FROM keywords  WHERE keyword = '$q'  ORDER BY id DESC ";
        return self::query_cache($name,$sql,TRUE);
    }
    public static function SelectById($id)
    {
        $id = (int)($id);
        $name = 'SelectById'.$id;
        return self::query_cache($name, "SELECT * FROM keywords  WHERE id = $id  " , TRUE);

    }

    public static function SelectOtherKeyword($limit = 9)
    {
    	$name = 'SelectOtherKeyword';
    	$sql  = "SELECT * FROM keywords ORDER BY rand() LIMIT ".$limit;
    	return self::query_cache($name, $sql, FALSE);
    }
}