<?php
class Common
{

    protected $json_path = '';


    public static $_country = array(
        'vn'    => 'Việt Nam',
        'us'    => 'United States',
        'jp'    => 'Japan',
        'de'    => 'Germany',
        'pl'    => 'Poland'
    );
    public static $_product_size = array(
        '10'    => '10ml',
        '250'    => '250ml',
        '450'    => '450ml',
    );
    public static function reformatDate($timestamp, $format = 'Y/m/d')
    {
        $date = '';
        if ($timestamp) {
            $date = date($format, $timestamp);
        }
        return $date;
    }

    public static function ConvertArrayToString($arr = array())
    {
        $rs = '';
        if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                $rs .= $value;
                if ($key < count($arr) - 1) {
                    $rs .= ',';
                }
            }
        }
        return $rs;
    }

    public static function GetInfoYouTuBeByChanelId($_channel_id = "UCyQobySFx_h9oFwsBV0KGdg", $_limit = 10)
    {
        $_api_key = "AIzaSyAgjIJ5L-xg3WF-T7rHhjfNcyGLiidqJ2Y";
        $video_list = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $_channel_id . '&maxResults=' . $_limit . '&key=' . $_api_key));
        return (!empty($video_list)) ? $video_list->items : $video_list;
    }
    public static function GetInfoYouTuBeByVideoId($id = '3MhhyT9I5MY')
    {
        $_api_key = "AIzaSyAgjIJ5L-xg3WF-T7rHhjfNcyGLiidqJ2Y";
        $_api_url = "https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id=$id&key=$_api_key";
        $item = json_decode(file_get_contents($_api_url));
        return (!empty($item)) ? $item->items : $item;
    }

    public static function getIp()
    {
        $ip = get_instance()->input->ip_address();
        return $ip;
    }

    public static function check_country_code()
    {
        // get session
        $ip = self::getIp();

        $lang_info = self::GetAuthSession('langinfo');
        if ($lang_info['ip'] == $ip) {
            $langCode = $lang_info['lang_code'];
        } else {
            $data = self::checkInfoIp();
            $langCode = $data['lang_code'];
        }
        return $langCode;
    }



    public static function SetAuthSession($name, $lang_data)
    {
        $CI = &get_instance();
        $res = $CI->session->set_userdata('langinfo', (array) $lang_data);
    }

    public static function UnsetAuthSession($name)
    {
        $CI = &get_instance();
        $res = $CI->session->unset_userdata($name);
    }


    public static function getCountryOption($name = NULL, $extends = NULL)
    {
        $countries = self::$_country;
        $html = "<select name='{$name}' class='form-control' {$extends}>";
        $html .= "<option value='0' >Select All</option>";

        foreach ($countries as $key => $country) {
            $html .= "<option value='{$key}' data-name='{$country}' >{$country}</option>";
        }
        $html .= "</select>";

        return $html;
    }

    public static function getProductOption($name = NULL, $extends = NULL)
    {
        $countries = self::$_product_size;
        $html = "<select name='{$name}'  {$extends}>";
        $html .= "<option value='0' >---</option>";

        foreach ($countries as $key => $country) {
            $html .= "<option value='{$key}' data-name='{$country}' >{$country}</option>";
        }
        $html .= "</select>";

        return $html;
    }
    public static function TimeFormatYTB($string = '')
    {
        $old = array("PT", "H", "M", "S");;
        $new = array("", ":", ":", "");
        $string = str_replace($old, $new, $string);
        return $string;
    }

    public static function numberFormat($number, $decimal = 0)
    {
        $number = floatval($number);
        return number_format($number, $decimal, '.', ',');
    }
    public static function number_replace($number)
    {
        $number =  preg_replace("/[^0-9.]/", '', $number);
        return $number;
    }
    public static function getFieldOb($field = array())
    {
        $CI = &get_instance();
        $res = (object) $CI->input->get($field, TRUE);
        return $res;
    }

    public static function stripViet($strInput, $replaceSpace = '', $code = "utf-8", $stripSpace = false)
    {
        $stripped_str = $strInput;
        $vietU = array();
        $vietL = array();

        if (strtolower($code) == "utf-8") {
            $i = 0;
            $vietU[$i++] = array('A', array("/Á/", "/À/", "/Ả/", "/Ã/", "/Ạ/", "/Ă/", "/Ắ/", "/Ằ/", "/Ẳ/", "/Ẵ/", "/Ặ/", "/Â/", "/Ấ/", "/Ầ/", "/Ẩ/", "/Ẫ/", "/Ậ/"));
            $vietU[$i++] = array('O', array("/Ó/", "/Ò/", "/Ỏ/", "/Õ/", "/Ọ/", "/Ô/", "/Ố/", "/Ồ/", "/Ổ/", "/Ộ/", "/Ơ/", "/Ớ/", "/Ờ/", "/Ớ/", "/Ở/", "/Ỡ/", "/Ợ/"));
            $vietU[$i++] = array('E', array("/É/", "/È/", "/Ẻ/", "/Ẽ/", "/Ẹ/", "/Ê/", "/Ế/", "/Ề/", "/Ể/", "/Ễ/", "/Ệ/"));
            $vietU[$i++] = array('U', array("/Ú/", "/Ù/", "/Ủ/", "/Ũ/", "/Ụ/", "/Ư/", "/Ứ/", "/Ừ/", "/Ử/", "/Ữ/", "/Ự/"));
            $vietU[$i++] = array('I', array("/Í/", "/Ì/", "/Ỉ/", "/Ĩ/", "/Ị/"));
            $vietU[$i++] = array('Y', array("/Ý/", "/Ỳ/", "/Ỷ/", "/Ỹ/", "/Ỵ/"));
            $vietU[$i++] = array('D', array("/Đ/"));
            unset($i);
            $i = 0;
            $vietL[$i++] = array('a', array("/á/", "/à/", "/ả/", "/ã/", "/ạ/", "/ă/", "/ắ/", "/ằ/", "/ẳ/", "/ẵ/", "/ặ/", "/â/", "/ấ/", "/ầ/", "/ẩ/", "/ẫ/", "/ậ/"));
            $vietL[$i++] = array('o', array("/ó/", "/ò/", "/ỏ/", "/õ/", "/ọ/", "/ô/", "/ố/", "/ồ/", "/ổ/", "/ỗ/", "/ộ/", "/ơ/", "/ớ/", "/ờ/", "/ở/", "/ỡ/", "/ợ/"));
            $vietL[$i++] = array('e', array("/é/", "/è/", "/ẻ/", "/ẽ/", "/ẹ/", "/ê/", "/ế/", "/ề/", "/ể/", "/ễ/", "/ệ/"));
            $vietL[$i++] = array('u', array("/ú/", "/ù/", "/ủ/", "/ũ/", "/ụ/", "/ư/", "/ứ/", "/ừ/", "/ử/", "/ữ/", "/ự/"));
            $vietL[$i++] = array('i', array("/í/", "/ì/", "/ỉ/", "/ĩ/", "/ị/"));
            $vietL[$i++] = array('y', array("/ý/", "/ỳ/", "/ỷ/", "/ỹ/", "/ỵ/"));
            $vietL[$i++] = array('d', array("/đ/"));
            unset($i);
        }
        for ($i = 0; $i < count($vietL); $i++) {
            $stripped_str = preg_replace($vietL[$i][1], $vietL[$i][0], $stripped_str);
            $stripped_str = preg_replace($vietU[$i][1], $vietU[$i][0], $stripped_str);
        }
        if ($stripSpace) {
            $stripped_str = str_replace(' ', '', $stripped_str);
        }
        if ($replaceSpace) {
            $stripped_str = preg_replace(array('[^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$]', '[[^a-zA-Z0-9\-]+]'), array('', $replaceSpace), $stripped_str);
        }
        $ret = strtolower($stripped_str);
        if (strpos($ret, '---') !== false) {
            return  str_replace('---', '-', $ret);
        } else {
            return  str_replace('--', '-', $ret);
        }
    }
    public static function getLink($link)
    {
        return site_url($link);
    }

    public static function ShowTextAlert($str, $success = true)
    {
        if ($success)
            return '<p class="text-success">' . $str . '</p>';
        else {
            return '<p class="text-danger">' . $str . '</p>';
        }
    }

    public static function ShowAlert($str, $success = true)
    {
        if ($success)
            return '<p class="alert alert-success">' . $str . '</p>';
        else {
            return '<p class="alert alert-danger">' . $str . '</p>';
        }
    }

    public static function Base_Url()
    {
        if (
            isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
        ) {
            $protocol = 'https://';
        } else {
            $protocol = 'http://';
        }
        $base = $protocol . $_SERVER["SERVER_NAME"];

        return $base;
    }

	public static function GetURLVideoFromString($str)
	{
		if(empty($str)) return "";
		preg_match_all('/<iframe[^>]+src="([^"]+)"/', $str, $match);

		$urls = $match[1];
		return $urls;
    }

    public static function GetValueConfig($key, $config)
    {
        if(!empty($config) && is_array($config)){
            foreach ($config as $cf){
                if($cf->key == $key){
                    return $cf->value;
                }
            }
        }
        return "#";
    }
}
