<?php

/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 8:57 AM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected static $db, $cache;

    protected static $_tbl;

    function __construct()
    {
        parent::__construct();
        self::$db    = $this->db;
        self::$cache = $this->cache;
    }


    protected  static function query_cache($name, $sql, $row = TRUE, $ttl = 3600)
    {
        $name = get_called_class() . '_' . $name . '.cache';
        //echo $sql;
        $res  = self::$cache->get($name);
        if ($res) {
            return $res;
        }
        $res = self::$db->query($sql);
        $res = ($row) ? $res->row() : $res->result();
        if ($res)
            self::$cache->save($name, $res, $ttl);

        return $res;
    }

    public static function SelectById($id)
    {
        $id   = (int) $id;
        $name = 'SelectById' . $id;
        $sql  = "SELECT * FROM " . static::$_tbl . " WHERE id = " . $id;
        //echo  $sql;
        $res  = self::query_cache($name, $sql, TRUE);
        return $res;
    }

    public static function SelectAll()
    {
        $name = 'SelectAll';
        $sql  = "SELECT * FROM " . static::$_tbl . " ORDER BY id DESC ";
        $res = self::query_cache($name, $sql, FALSE);
        return $res;
    }

    public static function SelectPage($page = 1, $limit = 20, &$total = 0)
    {
        $name = 'SelectPage' . $page . $limit;
        $ls   = self::limit_str($page, $limit);
        $sql  = 'SELECT * FROM ' . static::$_tbl . ' ORDER BY id DESC ' . $ls;
        $count = "SELECT COUNT(id) AS total FROM " . static::$_tbl;
        $total = self::query_cache('SelectPageTotalRow', $count, TRUE)->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function CountAll()
    {
        $count = "SELECT COUNT(id) AS total FROM " . static::$_tbl;
        $total = self::query_cache('SelectPageTotalRow', $count, TRUE)->total;
        return $total;
    }


    public static function Insert($data)
    {
        self::$db->insert(static::$_tbl, $data);
        self::clear_cache(static::$_tbl);
        return self::$db->insert_id();
    }

    public static function Update($id, $data)
    {
        self::$db->update(static::$_tbl, $data, array('id' => (int) $id));
        self::clear_cache(static::$_tbl);
    }

    public static function Delete($id)
    {
        self::$db->delete(static::$_tbl, array('id' => (int) $id));
        self::clear_cache(static::$_tbl);
    }

    public static function DeleteList($list_id)
    {
        if (!is_array($list_id) || empty($list_id)) {
            return FALSE;
        }

        self::$db->where_in('id', $list_id);
        self::$db->delete(static::$_tbl);

        return TRUE;
    }


    protected static function clear_cache($name)
    {
        $path  = APPPATH . 'cache/' . get_called_class() . $name . '*.cache';
        //echo $path;
        $files = glob($path);
        if (count($files) > 0) {
            foreach ($files as $file) {
                try {
                    @unlink($file);
                } catch (Exception $e) {
                }
            }
        } else {
            $path = APPPATH . 'cache/' . get_called_class() . '*.cache';
            $files = glob($path);
            //print_r($files);
            if (count($files) > 0) {
                foreach ($files as $file) {
                    try {
                        @unlink($file);
                    } catch (Exception $e) {
                    }
                }
            }
        }
    }



    protected static function limit_str(&$page = 1, &$limit = 30)
    {
        $limit = (int) $limit;
        $page  = (int) $page;
        if ($page < 1) {
            $page = 1;
        }
        if ($limit < 1) {
            $limit = 30;
        }
        $str  = ' LIMIT ' . ($page - 1) * $limit . ',' . $limit;
        return $str;
    }

    public static function getWhere($table, $condition = array(), $row = TRUE)
    {
        $sql = self::$db->get_where($table, $condition);
        $res = ($row) ? $sql->row() : $sql->result();
        return $res;
    }
}
