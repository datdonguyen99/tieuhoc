<?php

/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 8:55 AM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends MY_Model
{
    public static $_tbl = 'posts';
    public static  $_type = array('post', 'game');
    public static $_fields = array(
        'title', 'slug', 'body', 'meta_description', 'meta_title', 'meta_keywords', 'short_description', 'thumb', 'category_id', 'tags',
        'title_en', 'slug_en', 'body_en', 'meta_description_en', 'meta_title_en', 'news_update'
    );


    public function __construct()
    {
        parent::__construct();
    }


    public static function SelectById($id)
    {
        $id   = (int) $id;
        $name = 'SelectById' . $id;
        $sql  = "SELECT p.*, b.thumb as banner FROM posts p LEFT JOIN banners b ON p.id = b.post_id WHERE p.id = $id ";
        return self::query_cache($name, $sql, TRUE);
    }

    public static function SelectBySlug($slug)
    {
        $slug   = self::$db->escape_str($slug);
        $name   = 'SelectBySlug' . $slug;
        return self::query_cache($name, "SELECT p.*, c.slug as cate_slug FROM posts p LEFT JOIN categories c ON p.category_id = c.id WHERE p.slug = '$slug' AND is_deleted = 0 ", TRUE);
    }

    public static function SelectByType($type, $limit = 5)
    {
        $page = 1;
        $limit = self::limit_str($page, $limit);
        $name   = 'SelectByType' . $type;
        return self::query_cache($name, "SELECT p.* FROM posts p WHERE p.type = '$type' AND is_deleted = 0 $limit", FALSE);
    }

    public static function SelectOldNews($type, $limit = 5)
    {
        $page = 1;
        $limit = self::limit_str($page, $limit);
        $name   = 'SelectOldNews' . $type;

        return self::query_cache($name, "SELECT p.* FROM posts p WHERE p.type = '$type' AND is_deleted = 0 ORDER BY p.created_date ASC $limit", FALSE);
    }

    public static function SelectByCategoryId($cate_id, $page = 1, $limit = 30, &$total = 0, $show_all = 0)
    {
        $cate_id   = (int) $cate_id;


        $name  = 'SelectByCategoryId' . $cate_id . $page;
        $limit = self::limit_str($page, $limit);
        $where = "WHERE category_id = $cate_id ";

        if (!$show_all) {
            $where .= ' AND is_deleted = 0  ';
        }

        $sql   = "SELECT p.*, c.slug as cate_slug FROM posts p INNER JOIN categories c ON p.category_id = c.id $where ORDER BY p.id DESC  $limit ";
        $total_sql = "SELECT COUNT(id) as total FROM posts p $where ";
        $count = self::query_cache('SelectCountCategoryId' . $cate_id, $total_sql, TRUE, 3600);
        $total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectByCategoryId2($cate_id, $limit = 10, $exclude_id = "", $show_all = false)
    {
        $cate_id   = (int) $cate_id;
        $page = 1;
        $name  = 'SelectByCategoryId2' . $cate_id . $limit . $exclude_id;
        $limit = self::limit_str($page, $limit);
        $where = "WHERE category_id = $cate_id ";
        if (!empty($exclude_id)) $where .= " AND p.id NOT IN ($exclude_id)";
        if ($show_all) {
            $where .= ' AND is_deleted = 0  ';
        }

        $sql   = "SELECT p.* FROM posts p $where ORDER BY p.id DESC  $limit ";
        //$total_sql = "SELECT COUNT(id) as total FROM posts p $where ";
        //$count = self::query_cache('SelectCountCategoryId'.$cate_id, $total_sql, TRUE, 3600);
        //$total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectByCategoryId2Paging($cate_id, $page = 1, $limit = 10, $exclude_id = "", $show_all = false)
    {
        $cate_id   = (int) $cate_id;
        $name  = 'SelectByCategoryId2Paging' . $cate_id . $page . $limit . $exclude_id;
        $limit = self::limit_str($page, $limit);
        $where = "WHERE category_id = $cate_id ";
        if (!empty($exclude_id)) $where .= " p.id NOT IN ($exclude_id)";
        if ($show_all) {
            $where .= ' AND is_deleted = 0  ';
        }

        $sql   = "SELECT p.* FROM posts p $where ORDER BY p.id DESC  $limit ";
        //$total_sql = "SELECT COUNT(id) as total FROM posts p $where ";
        //$count = self::query_cache('SelectCountCategoryId'.$cate_id, $total_sql, TRUE, 3600);
        //$total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectByCategoryIdList($cate_id_list = array(), $page = 1, $limit = 30, &$total = 0, $show_all = 0)
    {
        if (empty($cate_id_list)) return;
        $name  = 'SelectByParentId' . implode('_', $cate_id_list) . $page;
        $limit = self::limit_str($page, $limit);
        $where = "WHERE category_id IN (" . implode(',', $cate_id_list) . ") ";

        if (!$show_all) {
            $where .= ' AND is_deleted = 0  ';
        }

        $sql   = "SELECT p.*, c.slug as cate_slug FROM posts p INNER JOIN categories c ON p.category_id = c.id $where ORDER BY p.id DESC  $limit ";
        $total_sql = "SELECT COUNT(id) as total FROM posts p $where ";
        $count = self::query_cache('SelectCountCategoryId' . implode('_', $cate_id_list), $total_sql, TRUE, 3600);
        $total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }
    public static function SelectByParentType($type = '', $limit = 5)
    {
        $type = self::$db->escape_str($type);

        $name  = 'SelectByParentType' . $type;


        $where = "WHERE p.is_deleted = 0 AND c.type = '$type' ";

        $sql   = "SELECT p.*, c.slug as cate_slug FROM posts p 
                INNER JOIN categories c ON p.category_id = c.id $where ORDER BY p.id DESC  LIMIT $limit ";

        return self::query_cache($name, $sql, FALSE);
    }


    public static function SelectPage($page = 1, $limit = 20, &$total = 0, $show_all = FALSE)
    {
        $name = 'SelectPage' . $page . $limit;
        $ls   = self::limit_str($page, $limit);

        $where = " WHERE p.id>0 ";

        if (!$show_all) {
            $where .= ' AND is_deleted = 0  ';
        }

        $sql   = "SELECT p.*, c.slug as cate_slug FROM posts p 
        		 LEFT JOIN categories c ON p.category_id = c.id $where ORDER BY p.id DESC  $ls ";

        $total_sql = "SELECT COUNT(id) as total FROM posts p $where ";
        $count = self::query_cache('SelectCountAll', $total_sql, TRUE, 3600);
        $total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }


    public static  function SelectSearchKey($q, $limit = 30)
    {
        //self::$db->where(' is_published = 1 ');
        $q = self::$db->escape_str($q);
        $q = trim($q);
        $q = str_replace(' ', '%', $q);
        $sql = "SELECT p.*, c.slug as cate_slug FROM posts p 
        		INNER JOIN categories c ON p.category_id = c.id
                WHERE p.is_deleted = 0 AND post_type != 1 AND  title like '%$q%' OR body like '%$q%' 
                ORDER BY p.id DESC LIMIT " . (int) $limit;
        $res = self::$db->query($sql)->result();
        return $res;
    }

    public static function Filter($key, $category_id, $page = 1, $limit = 25, &$total = 0)
    {
        $category_id = (int) $category_id;

        $sql = 'SELECT p.*, c.slug as cate_slug FROM posts p 
    			INNER JOIN categories c ON p.category_id = c.id
    			WHERE p.id > 0 ';
        if (!empty($key)) {
            $sql .= " AND p.title like '%$key%' ";
        }

        if (!empty($category_id)) {
            $sql .= " AND category_id = $category_id ";
        }

        $sql .= ' ORDER BY p.id DESC ';

        $res = self::$db->query($sql)->result();

        return $res;
    }

    public static function GetLink($post, $lang = "vi")
    {
        if ($lang == "en") return "/{$post->slug_en}-bv-{$post->id}.html?lang=" . $lang;
        return "/{$post->slug}-bv-{$post->id}.html";
    }

    public static function SelectTopView($limit = 10)
    {
        $limit  = (int) $limit;
        $name   = 'SelectTopView' . $limit;
        $sql     = "SELECT p.*, c.slug as cate_slug 
        			FROM posts p LEFT JOIN categories c ON p.category_id = c.id 
        			WHERE p.is_deleted = 0 
        			ORDER BY view_number DESC LIMIT " . $limit;

        return self::query_cache($name, $sql, FALSE);
    }


    public static function SelectRelativePostByFree($post, $fee = 1, $limit = 10)
    {
        $name = 'SelectRelativePostByFree' . $post->id . $fee . $limit;

        $where = ' AND p.category_id = ' . $post->category_id . ' AND post_type = ' . (int) $fee;


        $sql = "SELECT p.*, c.slug as cate_slug 
        			FROM posts p LEFT JOIN categories c ON p.category_id = c.id 
        			WHERE p.is_deleted = 0 $where
        			ORDER BY view_number DESC LIMIT $limit";



        $res  = self::query_cache($name, $sql, FALSE, 3600);

        return  $res;
    }

    public static function SelectBySubCate($cate_id, $age, $type)
    {
        $name = 'SelectBySubCate' . $cate_id . $age . $type;


        $sql   = "SELECT p.*, c.slug as cate_slug,c.name as name_cate 
        		FROM posts p LEFT JOIN categories c ON p.category_id = c.id 
				LEFT JOIN sub_category s ON p.sub_cate_id = s.id 
				WHERE  p.category_id = {$cate_id} AND s.age = {$age} AND  s.type = '{$type}'
				ORDER BY p.id  ";

        $res  = self::query_cache($name, $sql, FALSE, 3600);

        return  $res;
    }

    public static function SelectRelateAllType($cate_id, $limit = 10)
    {
        $cate_id = (int) $cate_id;

        $sql_fee = "SELECT  COUNT(*) as total FROM posts WHERE category_id={$cate_id} AND post_type=1 ";

        $sql_unfee = "SELECT COUNT(*) as total FROM posts WHERE category_id={$cate_id} AND post_type=0 ";

        $count_fee = self::$db->query($sql_fee)->row()->total;

        $count_unfee = self::$db->query($sql_unfee)->row()->total;

        if ($count_fee > $limit && $count_unfee > $limit) {
            $lm_fee = round($limit / 2);
            $lm_unfee = $limit - $lm_fee;
        } else {

            if ($count_fee < $limit) {
                $lm_fee = $count_fee;
                $lm_unfee = $limit - $lm_fee;
            } else if ($count_unfee < $limit) {
                $count_unfee = $count_unfee;
                $lm_fee   = $limit - $count_unfee;
            }
        }

        $sql = "(SELECT * FROM posts WHERE category_id={$cate_id} AND post_type=1  LIMIT $lm_fee ) UNION (SELECT * FROM posts WHERE category_id={$cate_id} AND post_type=0 LIMIT $lm_unfee ) ";
        $res = self::$db->query($sql)->result();
        return $res;
    }

    public static function SelectTopViewByCate($cate_id)
    {
        $cate_id  = (int) $cate_id;
        $name   = 'SelectTopViewByCate' . $cate_id;
        $sql     = "SELECT * FROM posts p WHERE category_id = {$cate_id} ";
        return self::query_cache($name, $sql, TRUE);
    }


    public static function SelectByKeyWordId($keyword_id, $page, $limit, $total)
    {
        $keyword_id = (int) $keyword_id;

        $name = 'SelectByKeyWordId' . $keyword_id . $page . $limit;

        $ls   = self::limit_str($page, $limit);

        $sql  = "SELECT p.*, c.slug as cate_slug FROM posts p 
        		 LEFT JOIN categories c ON p.category_id = c.id 
        		 INNER JOIN tags t ON t.object_id = p.id
        		 WHERE t.keyword_id = {$keyword_id}
        		 ORDER BY p.id DESC  $ls ";

        $total_sql = "SELECT COUNT(id) as total FROM tags WHERE keyword_id = {$keyword_id}  ";

        $count = self::query_cache('SelectByKeyWordId' . $keyword_id, $total_sql, TRUE, 3600);
        $total = $count->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function ShowByLang($post, $lang = 'vi')
    {
        $p = $post;
        if ($lang != "vi") {
            $p->title = $post->title_en;
            $p->slug = $post->slug_en;
            $p->meta_title = $post->meta_title_en;
            $p->body = $post->body_en;
            $p->meta_keywords = $post->meta_keywords_en;
            $p->meta_description = $post->meta_description_en;
            //echo $post->title= $post->title_en;
            flush();
            //echo $p->title;
        }

        return $p;
    }

    public static function CountByCategoryID($cate_id)
    {
        $sql = "SELECT  COUNT(*) as total FROM posts WHERE category_id={$cate_id}";
        return self::query_cache("CountByCategoryID" . $cate_id, $sql, true)->total;
    }

    public static function GetLatestNewsUpdate($num = 10)
    {
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $num";
        return self::query_cache("GetLatestNewsUpdate" . $num, $sql, false);
    }
}
