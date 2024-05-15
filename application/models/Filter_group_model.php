<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_group_model extends MY_Model 
{
	protected static $_tbl = 'filter_group';
	function __construct()
	{
		parent::__construct();

	}


	public static function SelectAll()
	{
		$name = 'SelectAll';
		$sql  = "SELECT * FROM filter_group ORDER BY sort_order ASC, name ASC ";
		$res = self::query_cache($name, $sql, FALSE);
		return $res;
	}

	public static function GetSelectOption($name = 'filter_id', $extends = ' id="filter_id" ')
	{
		$all = self::SelectAll();

		$html = "<select name='{$name}' class='form-control' {$extends}><option value='0'>--Select--</option>";
		foreach ($all as $g) 
		{
			$html .= "<optgroup label='{$g->name}'>";
			
			$filter = Filter_model::SelectByGroupId($g->id);

			foreach ($filter as $f) 
			{
				$html .= "<option value='{$f->id}'>{$f->name}</option>";
			}
			$html .= "</optgroup>";			
		}

		$html .= "</select>";

		return $html;
	}


	

}