<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_model extends MY_Model 
{
	protected static $_tbl = 'filter';
	function __construct()
	{
		parent::__construct();

	}


	public static function SelectByProductId($pid)
	{
		$pid = (int) $pid;
		$name = 'SelectByProductId' . $pid;
		$sql  = "SELECT f.* FROM filter f 
				INNER JOIN product_filter pf ON pf.id = f.product_id
				WHERE pf.product_id = {$pid}
				ORDER BY f.sort_order ASC, f.name ASC ";
				
		$res = self::query_cache($name, $sql, FALSE);
		return $res;			
	}

	public static function SelectByCategory($category)
	{		
		if (empty($category->filter_list_id))
		{
			return array();
		}
		$name = 'SelectByCategory' . $category->id;
		$sql  = "SELECT * FROM filter WHERE id IN ($category->filter_list_id) ";				
		$res = self::query_cache($name, $sql, FALSE);
		return $res;			
	}

	public static function SelectByGroupId($gid)
	{
		$gid = (int) $gid;
		$name  = 'SelectByGroupId' .$gid;
		$sql = "SELECT * FROM filter WHERE filter_group_id = {$gid} ORDER BY sort_order ASC, name ASC";

		$res = self::query_cache($name, $sql, FALSE);
		return $res;	
			
	}

	public static function DeleteByGroupId($gid)
	{
		$gid = (int) $gid;
		
		$res = self::$db->delete('filter', ['filter_group_id' => $gid]);	

		return $res;	
			
	}

	public static function DeleteByGroupNotList($gid, $list_id)
	{
		$gid = (int) $gid;
		if (!is_array($list_id) || empty($list_id))
		{
			return FALSE;			
		}

		self::$db->where('filter_group_id', $gid);
		self::$db->where_not_in('id', $list_id);
		self::$db->delete('filter');

		return TRUE;
	}



	public static function FilterByData($filter, $sort, $total,  $page, $limit)
	{
			
	}

	

}