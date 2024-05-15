<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Images_product_model extends MY_Model
{
	protected static $_tbl = 'images_product';
	public static $_field = array('id', 'product_id', 'img_url');
	
	public function __construct()
	{
		parent::__construct();
		
	}


	public static function SelectPage($page = 1, $limit = 20, &$total = 0)
    {
        $name = 'SelectPage'.$page.$limit;
        $ls   = self::limit_str($page, $limit);
        $sql  = 'SELECT * FROM '.static::$_tbl.' ORDER BY sort_order ASC '.$ls;
        $count = "SELECT COUNT(id) AS total FROM ".static::$_tbl .'';
        $total = self::query_cache('CountAllBanner', $count, TRUE)->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectByPostId($post_id,$type = 'news'){
	    $post_id = (int)$post_id;
	    $type = self::$db->escape_str($type);
        $name = 'SelectByPostId'.$post_id.$type;
        $sql = "SELECT * FROM banners WHERE post_id = {$post_id} AND type = '{$type}'";
        $res = self::query_cache($name,$sql,TRUE);
        return $res;

    }

	public static function SelectByProduct($p_id){
		$post_id = (int)$p_id;
		//$type = self::$db->escape_str($type);
		$name = 'SelectByProduct'.$post_id;
		$sql = "SELECT * FROM images_product WHERE product_id = {$post_id}";
		$res = self::query_cache($name,$sql,false);
		return $res;
	}

	public static function SelectByType($type,$limit=5)
	{
		$name = 'SelectByType'.$type.$limit;
		$sql = "SELECT b.*,p.title,p.slug FROM banners b LEFT JOIN posts p ON (b.post_id=p.id) WHERE b.type='$type' LIMIT 0,$limit";
		return self::query_cache($name,$sql,false);
    }

}
