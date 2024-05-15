<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model
{
	public static $_tbl  = 'categories';

	public static $_field = array(
		'name', 'slug', 'parent_id', 'meta_description', 'meta_title','description', 'url_thumb', 'sort_order','content','lang',
		'name_en','slug_en','meta_description_en','meta_title_en','description_en','content_en','type','show_home'
	);

	public static $_types = array('menu'=>'Menu Top','category'=>'Chuyên mục','landingpage'=>'Landing Page');
	
	public function __construct()
	{
		parent::__construct();
	}

	public static function ShowByLang($cate,$lang="vi"){
		if($lang=="en"){
			$cate->name = $cate->name_en;
			$cate->slug = $cate->slug_en;
			$cate->description= $cate->description_en;
			$cate->content =$cate->content_en;
			$cate->meta_title =$cate->meta_title_en;
			$cate->meta_description =$cate->meta_description_en;
		}
		return $cate;
	}

    public static function SelectAll($type = 'menu')
    {
        $name = 'SelectAll_' . $type;
        if(empty($type)){
            $sql  = "SELECT * FROM ". self::$_tbl . " ORDER BY id DESC ";
        }
        else $sql  = "SELECT * FROM ". self::$_tbl . " WHERE type = '{$type}' ORDER BY id DESC ";
        $res = self::query_cache($name, $sql, FALSE);
        return $res;
    }

	public static function SelectBySlug($slug)
    {
        if (!is_string($slug))
        {
            return NULL;
        }
        $slug = self::$db->escape_str($slug);
        $name = 'SelectBySlug'.$slug;
        $sql  = "SELECT * FROM categories WHERE slug = '$slug' OR slug_en='$slug' ";
        return self::query_cache($name, $sql);
    }

    public static function SelectByType($type = 'menu', $lang = 'vn')
    {
        $type = self::$db->escape_str($type);
        $lang = self::$db->escape_str($lang);
        $name = 'SelectByType'.$type.$lang;
        $sql  = "SELECT * FROM categories
                 WHERE  type='$type'  ";
        return self::query_cache($name, $sql, FALSE);
    }


    public static function SelectByParentType($type='', $lang ='vn')
    {
        $type = self::$db->escape_str($type);
        $lang = self::$db->escape_str($lang);

        $name = 'SelectByParentType'.$type.$lang;
        $sql  = "SELECT * FROM categories
                 WHERE  parent_id = (select id from categories WHERE type='{$type}' ORDER BY sort_order ASC LIMIT 1)  ";
        return self::query_cache($name, $sql, FALSE);

    }

    public static function SelectByLang($lang = 'vn')
    {
        $lang = self::$db->escape_str($lang);
        $name = 'SelectByLang'.$lang;
        $sql  = "SELECT * FROM categories WHERE lang = '$lang' ";
        return self::query_cache($name, $sql);
    }

    public static function SelectByParentId($id){
        $id = (int) $id;

        $name = 'SelectByParentId'.$id;
        $sql  = "SELECT * FROM categories WHERE parent_id = $id ";
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectMenuParent($type = 'menu',$lg='vi'){
        $name = 'SelectMenuParent_'.$type.$lg;
        $sql  = "SELECT * FROM categories WHERE parent_id = 0 AND type ='{$type}' AND lang='$lg' ORDER BY sort_order ASC ";
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectPage($page = 1, $limit = 20, &$total = 0, $type = 'menu')
    {
        $name = 'SelectPage'.$page.$limit.$type;
        $ls   = self::limit_str($page, $limit);
        if(!empty($type)){
			$sql  = "SELECT * FROM categories WHERE type = '{$type}' ORDER BY sort_order ASC ".$ls;
			$count = "SELECT COUNT(id) AS total FROM categories WHERE type = '{$type}' ";
		}
        else{
			$sql  = "SELECT * FROM categories ORDER BY sort_order ASC ".$ls;
			$count = "SELECT COUNT(id) AS total FROM categories";
		}


        $total = self::query_cache('CountTotalRow', $count, TRUE)->total;
        return self::query_cache($name, $sql, FALSE);
    }


    public static function SelectOptionHtml($type = 'menu', $selected_id=0)
    {
    	$name = 'SelectAllSubOptionHtml'.$type.$selected_id;

    	$sql  = "SELECT * FROM categories WHERE parent_id=0 ";

    	$res  = self::query_cache($name, $sql, FALSE, 3600);
        //print_r($res);
    	$str  = '';
    	foreach ($res as $e) {
            $subs = self::SelectByParentId($e->id);
            if($subs){
                if($e->id==$selected_id){
                    $str .= "<option selected value='{$e->id}'>{$e->name}</option>";
                }
                else
                    $str .= "<option value='{$e->id}'>{$e->name}</option>";
                foreach($subs as $sub){

                    if($sub->id==$selected_id){
                        $str .= "<option selected value='{$sub->id}'>-->{$sub->name}</option>";
                    }
                    else
                        $str .= "<option value='{$sub->id}'>-->{$sub->name}</option>";
                }
            }
            else{
                if($e->id==$selected_id){
                    $str .= "<option selected value='{$e->id}'>{$e->name}</option>";
                }
                else
                    $str .= "<option value='{$e->id}'>{$e->name}</option>";
            }

    	}

    	return $str;
    }

    public static function GetLink($cate, $lang="vi")
    {
        if(!empty($cate->slug)){
        	if($lang != "vi")
        		$link = "/".$cate->slug_en."-id-".$cate->id.".html?lang=".$lang;
            else $link = '/' . $cate->slug. "-id-".$cate->id.'.html';

        }
        else if(!empty($cate['slug']))
        {
        	if($lang != "vi")
        		$link = "/".$cate['slug_en'].".html?lang=".$lang;
            else $link = '/' . $cate['slug']. '.html';
        }
        return $link;

    }


    public static function GetMenuHtml()
    {
        $name = self::$_tbl. 'GetMenuHtml';
        $res  = self::$cache->get($name);
        //if ($res){ return $res; }


        $menu = self::SelectMenuParent();
        $html = '';



        foreach ($menu as $m) {
            $link  = self::GetLink($m);

            $child = self::SelectByParentId($m->id);
            $html .= "<li class='nav-item'><a class='nav-link' href='$link'>$m->name</a>";


            if (!empty($child))
            {
                $html .= "<i class='fa fa-angle-right' style='position: absolute; top: 40%; right: 13px; color: #333;' aria-hidden='true'></i>";
                $html .=" <ul class='dropdown-menu-2'>";

                foreach ($child as $c)
                {
                    $link  = self::GetLink($c);
                    $html .= "<li class='nav-item-lv2'><a class='nav-link' href='$link'>$c->name</a></li>";
                }

                $html .= "</ul>";
            }

            $html .= "</li>";
        }

        self::$cache->save($name, $html, 3600);

        return $html;

    }

    public static function GetMenuProductHtml()
    {
        $name = self::$_tbl. 'GetMenuProductHtml';
        $res  = self::$cache->get($name);
        //if ($res){ return $res; }


        $menu = self::SelectMenuParent();
        $html = '';


        foreach ($menu as $m) {
            $link  = self::GetLink($m);

            $child = self::SelectByParentId($m->id);
            $class_parent = !empty($child) ? 'parent' : '';
            $html .= "<li class='level1 $class_parent item'>";
            $html .= "<a href='$link'><h2><span>$m->name</span>";


            if (!empty($child))
            {
                $html .= "<span class='btn-expand-menu'><i class='fa fa-plus' aria-hidden='true'></i></span></h2></a>";
                $html .= "<ul class='level1 mega-menu-level1'>";

                foreach ($child as $c)
                {
                    $link  = self::GetLink($c);
                    $html .= "<li class='level2'><a href='$link'><i class='fa fa-circle'></i><span>$c->name</span></a> </li>";
                }

                $html .= "</ul>";
            }
            else
            {
                $html .= "</h2></a>";

            }

            $html .= "</li>";
        }

        self::$cache->save($name, $html, 3600);

        return $html;

    }

    public static function GetMenuMobile()
    {
        $name = self::$_tbl. 'GetMenuMobile';
        $res  = self::$cache->get($name);
        //if ($res){ return $res; }


        $menu = self::SelectMenuParent();
        $html = '';



        foreach ($menu as $m)
        {
            $link  = self::GetLink($m);
            $html .= "<li><a href='$link' >$m->name</a></li>";
        }

        self::$cache->save($name, $html, 3600);

        return $html;

    }



    public static function sub_child($items, $parent_id = 0, $level = 0)
    {
        $child_list = array();
        $level++;

        foreach ($items as $e)
        {
            if ($e->parent_id == $parent_id)
            {
                $e->level = $level;
                $child_list[] = $e;

            }
        }

        if (count($child_list)>0)
        {
            foreach ($child_list as $e)
            {
                $e->sub = self::sub_child($items, $e->id, $level);
            }

            return $child_list;
        }else{
            return array();
        }

    }



    public static function cms_select_option($list, $name = NULL, $type = 'menu')
    {


        if ($name != NULL){
            $dropdown = "<select name='$name' class='form-control' ><option value='0'>/</option>";
            if (empty($list)){
                $list = self::SelectByParentType($type);
            }
        }else{
             $dropdown = '';
        }

        if (empty($list)){ return ''; }


        foreach ($list as $e)
        {
            $dropdown .= "<option value='$e->id' data-type='$e->type' > ";
            $level = (int) $e->level;
            for($i = $level; $i > 1; $i--){
                $dropdown .= '---';
            }

            $dropdown .= " $e->name </option>";
            if ($e->sub){

                $dropdown .= self::cms_select_option($e->sub);
            }
        }

        if ($name != NULL)
        {
            $dropdown .= "</select>";
        }

        return $dropdown;
    }



    public static function cms_list_row($list, &$stt = 0, $lang = "vi")
    {
        $str = "<tbody >";

        foreach ($list as $e) {
			if ($e->lang == $lang) {
				$space = '';

				for ($i = $e->level; $i > 1; $i--) {
					$space .= '---';
				}

				$stt++;
				$str .= "<tr class='ui-state-default '>
                        <td>$stt</td>
                        <td id='name_cate' class='text-capitalize'> $space $e->name</td>                        
                        <td>
                            <ul class='list-inline'>
								<li id='id_$e->id'>
								<a href='/backend/category_manage/update/$e->id' class='btn btn-sm btn-default'><i class='fa fa-edit'></i> Edit</a>
								<a style='margin-left: 15px;' href='/backend/category_manage/delete/$e->id' class='delete btn btn-sm btn-default'><i class='fa fa-remove'></i> Xóa</a>
								</li>
							</ul>
                        </td>
                    </tr>";
				if ($e->sub) {
					$str .= self::cms_list_row($e->sub, $stt,$lang);
				}

			}
		}
        $str .= "</tbody>";

        return $str;
    }

	public static function cms_list_row2($list, &$stt = 0, $lang = "vi")
	{
		$str = "<tbody >";

		foreach ($list as $e) {
			if (true) {
				$space = '';
				$name = ($lang=='en')?$e->name_en:$e->name;
				$type = $e->type;
				for ($i = $e->level; $i > 1; $i--) {
					$space .= '---';
				}

				$stt++;
				$str .= "<tr class='ui-state-default '>
                        <td>$stt</td>
                        <td id='name_cate' class='text-capitalize'> $space $name</td>                        
                        <td id='cate_type' class='text-capitalize'> $type</td>                        
                        <td>
                            <ul class='list-inline'>
								<li id='id_$e->id'>
								<a href='/backend/category_manage/update/$e->id' class='btn btn-sm btn-default'><i class='fa fa-edit'></i> Edit</a>
								<a style='margin-left: 15px;' href='/backend/category_manage/delete/$e->id' class='delete btn btn-sm btn-default'><i class='fa fa-remove'></i> Xóa</a>
								</li>
							</ul>
                        </td>
                    </tr>";
				if ($e->sub) {
					$str .= self::cms_list_row2($e->sub, $stt,$lang);
				}

			}
		}
		$str .= "</tbody>";

		return $str;
	}



/*
Category build tree 2017.08
*/

    public static function BuildCateRow($categories = NULL)
    {
    	$cate = [ 'parent' => [], 'data' =>[] ];

    	if ($categories == NULL)
    	{
    		$categories = self::SelectAll();
    	}

    	foreach ($categories as $e)
    	{
    		$cate['parent'][$e->parent_id][] = $e->id;
    		$cate['data'][$e->id] = $e;

    	}

    	$res = self::BuildCatePath(0, $cate);

    	return $res;

    }


    public static function GetSelectOption($categories, $name = NULL, $extends = NULL )
    {
    	$cate = self::BuildCateRow($categories);
    	$html = "<option value='0' >/</option>";
    	foreach ($cate as $e)
    	{
    		$e = (object) $e;
    		$html .= "<option value='{$e->id}' data-name='{$e->name}' >{$e->label}</option>";
    	}

    	if (!empty($name))
    	{
    		$html = "<select name='{$name}' class='form-control' {$extends}>" . $html . "</select>";
    	}
    	return $html;
    }



    private static function BuildCatePath($parent_id, $cate, $par_html = NULL, $tree = 'row')
    {
    	$list = [];
    	if (isset($cate['parent'][$parent_id]))
    	{
    		$str = (empty($par_html)) ? '': $par_html . ' &#10230; ';

    		foreach ($cate['parent'][$parent_id] as $cat_id)
    		{
    			$e = $cate['data'][$cat_id];

    			$list[] = array(
    				'name' => $e->name,
    				'id'   => $cat_id,
    				'label' => $str . $e->name,
    				'sub' => []
    			);

    			$sub =  self::BuildCatePath($cat_id, $cate, $str . $e->name);
    			if (!empty($sub))
    			{
    				if ($tree == 'row')
    				{
    					$list = array_merge($list, $sub);
    				}else{
    					$list[count($list) - 1]['sub'] = $sub;
    				}

    			}
    		}
    	}
    	return $list;
    }
    public static function GetAllChildCate(&$result,$parent_id,$level = 0)
    {
       $data = self::SelectByParentId($parent_id);
        if($data){
            foreach($data as $index=>$dt){
                $result[] = $dt;
                self::GetAllChildCate($result,$dt->id,1);

            }
            return $result;
        }
    }

    public static function CateDetailHtml()
    {
        $name = self::$_tbl. 'CateDetailHtml';
        $res  = self::$cache->get($name);
        //if ($res){ return $res; }


        $menu = self::SelectMenuParent();
        $html = '';



        foreach ($menu as $m) {
            $link  = self::GetLink($m);

            $child = self::SelectByParentId($m->id);
            $html .= " <div class='panel panel-mod'>";
            $html .= " <div class='panel-heading'><h4 class='panel-title'>";
            $html .= " <a class='category - title' href='$link'>$m->name<span data-toggle='collapse' class='collapsed' data-parent='#accordion' href='#$m->slug'><i class='fa fa-plus' aria-hidden='true'></i></span></a >";
            $html .= "</h4></div>";


            if (!empty($child))
            {
                $html .= "<div id='$m->slug' class='panel-collapse collapse'>";
                $html .=" <div class='panel-body'><ul>";

                foreach ($child as $c)
                {
                    $link  = self::GetLink($c);
                    $html .= "<li><a href='$link' class=''><i class='fa fa-circle' aria-hidden='true'></i>$c->name</a></li>";
                }

                $html .= "</ul></div></div>";
            }

            $html .= "</div>";
        }

        self::$cache->save($name, $html, 3600);

        return $html;

    }

    public static function SelectPageByType($page = 1, $limit = 20,$type = '', &$total = 0, $lang = 'vn')
    {
        $name = 'SelectPage'.$page.$limit.$lang;
        $ls   = self::limit_str($page, $limit);
        if (!empty($lang))
        {
            $lang = 'vn';
        }
        $sql  = "SELECT * FROM categories WHERE type = '{$type}' ORDER BY sort_order ASC ".$ls;


        $count = "SELECT COUNT(id) AS total FROM categories WHERE type = '{$type}' ";
        $total = self::query_cache('SelectPageTotalRow', $count, TRUE)->total;
        return self::query_cache($name, $sql, FALSE);
    }

    public static function SelectByAllSubCateId($cate_id, $page = 1, $limit = 25, &$total = 0)
    {
        $cate_id = (int) $cate_id;
        $limit_str = self::limit_str($page, $limit);
        $name = 'SelectByAllSubCateId'. $cate_id. $page. $limit;

        $res = self::$cache->get($name);
        if ($res){ return $res; }



        $ids = Category_model::GetChildCateAllLevel($cate_id);
        $ids = implode(',', $ids);
        $sql = "SELECT p.* FROM products p
    			INNER JOIN product_category c ON p.id = c.product_id
    			WHERE p.cate_id IN ($ids) OR c.category_id IN ($ids) ";
        $sql .= $limit_str;

        $res = self::$db->query($sql)->result();

        self::$cache->save($name, $res, 3600);
        return $res;

    }

    public static function GetChildCateAllLevel($parent_id, $cates = NULL)
    {
        if (empty($cates))
        {
            $cates = self::SelectAll();
        }
        $items = [$parent_id];
        foreach ($cates as $e)
        {
            if ($e->parent_id == $parent_id)
            {
                $items[] = $e->id;
                $child_items = self::GetChildCateAllLevel($e->id, $cates);
                $items = array_merge($items, $child_items);
            }
        }

        return $items;
    }

	public static function SelectCateShowHome($lang="vi")
	{
		return self::query_cache("SelectCateShowHome".$lang,"SELECT * FROM categories WHERE show_home=1 AND lang='$lang'",false);

    }
}
