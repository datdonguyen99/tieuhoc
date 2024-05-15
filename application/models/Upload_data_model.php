<?php


class Upload_data_model extends MY_Model
{
	protected static $_tbl = "upload_data";
	public static $_fields = array('file_name','file_size','file_type','obj_id','obj_type','position','meta_link');
	public function __construct()
	{
		parent::__construct();
	}

	public static function SelectByObjID($obj_id)
	{
		return self::query_cache("SelectByOBJID".$obj_id,"SELECT * FROM upload_data WHERE obj_id=$obj_id",false);
	}

	public static function SelectByObjID_ObjType($obj_id,$obj_type)
	{
		return self::query_cache("SelectByOBJID".$obj_id,"SELECT * FROM upload_data WHERE obj_id=$obj_id AND obj_type='$obj_type'",false);
	}
}
