<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_filter_model extends MY_Model 
{

	protected static $_tbl  = 'category_filter';



	public function __construct()
	{
		parent::__construct();		
	}

	public static function SelectListByCate($pid)
	{
		$pid  = (int) $pid;
		$name = 'SelectListCateByProduct' . $pid;

		$sql  = "SELECT GROUP_CONCAT(filter_id) as list_id FROM category_filter WHERE category_id = {$pid} LIMIT 1";
		$res  = self::query_cache($name, $sql, TRUE, 3600);

		
		return ($res) ? $res->list_id : "";	
			
	}

	public static function DeleteByCateId($pid)
	{
		$pid  = (int) $pid;

		self::$db->where('category_id', $pid);
		self::$db->delete('category_filter');
		return TRUE;			
	}

	public static function InsertBatch($data)
	{
		self::$db->insert_batch('category_filter', $data);
			
	}

	public static function SelectFilterByCategoryId($cat_id)
	{
		$cat_id = (int) $cat_id;
		$sql = " SELECT g.id as gid, f.id as fid, g.name as group_name, f.name as filter_name 
				FROM category_filter cf 
				INNER JOIN filter f ON f.id = cf.filter_id
				INNER JOIN filter_group g ON f.filter_group_id = g.id 
				
				WHERE cf.category_id = {$cat_id} 
				ORDER BY gid ASC, f.sort_order ASC
				";

		$res = self::$db->query($sql)->result();

		return $res;			
	}
	

}

/* End of file Category_filter_model.php */
/* Location: ./application/models/Category_filter_model.php */