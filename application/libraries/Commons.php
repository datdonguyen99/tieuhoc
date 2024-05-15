<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PeterTran
 * Date: 1/9/13
 * Time: 9:53 PM
 * To change this template use File | Settings | File Templates.
 */

class Commons
{
    function SendMail($sender, $recievers, $content, $subject, $name_sender = '', $name_reciever)
    {
        $this->load->library('email');
        $this->load->library('parser');

        $this->email->clear();
        $config['mailtype'] = "html";
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($sender, 'Website');
        //$list = array('chamil@archmage.lk', 'chamilsanjeewa@gmail.com');
        $list = $recievers;
        $this->email->to($list);
        //$data = array();
        $data = $content;
        $htmlMessage = $this->parser->parse('messages/email', $data, true);
        $this->email->subject($subject);
        $this->email->message($htmlMessage);


        if ($this->email->send()) {
            echo 'Your email was sent, thanks.';
        } else {
            show_error($this->email->print_debugger());
        }
    }



//    public static function stripUnicode($str, $replace = false)
//    {
//        if (!$str) return false;
//        $str = trim($str);
//        //$str = mb_convert_encoding($str,'UTF-16LE', 'UTF-8');
//        $unicode = array(
//            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
//            'd' => 'đ',
//            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
//            'i' => 'í|ì|ỉ|ĩ|ị',
//            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
//            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
//            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
//            'D' => 'Đ',
//            'E' => 'É,È,Ẻ,Ẽ,Ẹ,Ê,Ế,Ề,Ể,Ễ,Ệ',
//            'I' => 'Í,Ì,Ỉ,Ĩ,Ị',
//            'O' => 'Ò,Ó,Ọ,Ỏ,Õ,Ô,Ố,Ồ,Ổ,Ỗ,Ộ,Ơ,Ớ,Ờ,Ở,Ỡ,Ợ',
//            'U' => 'Ú,Ù,Ủ,Ũ,Ụ,Ư,Ứ,Ừ,Ử,Ữ,Ự',
//            'Y' => 'Ý,Ỳ,Ỷ,Ỹ,Ỵ',
//            'A' => 'Á,À,Ả,Ã,Ạ,Â,Ầ,Ấ,Ẩ,Ẫ,Ậ,Ă,Ắ,Ằ,Ẳ,Ẵ,Ặ',
//            'va'=> '&',
//            '/'=>'-'
//        );
//        foreach ($unicode as $nonUnicode => $uni) $str = preg_replace("/($uni)/i", $nonUnicode, $str);
//
//        if ($replace == true)
//            $str = strtolower(str_replace(' ', '-', $str));
//        $str = preg_replace('/\-+./', '-', $str);
//        $str = preg_replace('/[^A-Za-z0-9\-\ ]/', '', $str);
//        //echo $str .'<br>';
//        return $str;
//    }

    public static function stripUnicode2($str, $replace = false)
    {
        if (!$str) return false;
        $str = trim($str);
        $str = htmlspecialchars($str,ENT_QUOTES);

        //$str = strtolower($str);
        //$str = mb_convert_encoding($str,'UTF-16LE', 'UTF-8');
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Â|Ầ|Ấ|Ẩ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            'va'=> '&'
        );
        $utf8 = array(
            'a' => array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ','Á','À','Ả','Ã','Ạ','Â','Ầ','Ấ','Ẩ','Ẫ','Ậ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ'),
            'd' => array('đ','Đ'),
            'e' => array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ','É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
            'i' => array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
            'o' => array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ','Ò','Ó','Ọ','Ỏ','Õ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
            'u' => array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự','Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
            'y' => array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
            'va'=> array('&'),
            '-'=>array('"',':',',','.')

        );

            foreach($utf8 as $key=>$val){
                foreach($val as $v){
                    //echo stripos($str,$v)."<br/>";
                    if(strpos($str,$v)===false)
                    {}
                    else
                        $str = str_replace($v,$key,$str);
                }
            }
        $str = preg_replace('([^a-zA-Z0-9 ])', '', $str);
        if ($replace == true)
            $str = strtolower(str_replace(' ', '-', $str));
        $str = str_replace('---','-',$str);
        $str = str_replace('--','-',$str);
        $str = str_replace('\"','',$str);
        $str = str_replace('\“','',$str);
        $str = str_replace('“','',$str);
        $str = str_replace('\”','',$str);
        $str = str_replace('”','',$str);
        $str = str_replace('\'','',$str);


        return $str;
    }

    public static function GetMonday(DateTime $date)
    {
        while ($date->format('l') != 'Monday') {
            $date->sub(new DateInterval('P1D'));
        }
        return $date->format('Y-m-d');
    }

    public static function ReadNumbers($num)
    {
        if ($num == 0 || empty($num))
            return '';
        $l = strlen($num);
        $t = '';
        for ($i = 0; $i < $l; ++$i) {
            //$t .=
            $t .= substr($num, $l - $i - 1, 1);
            if ($i > 0 && $i < ($l - 1) && ($i + 1) % 3 == 0) {
                $t .= '.';
            }

        }
        $res = '';

        $l = strlen($t);
        for ($i = 0; $i < $l; ++$i) {
            $res .= substr($t, $l - $i - 1, 1);
        }
        return $res;
    }

    public static function ShowErrorMessage($msg, $have_html = true,$have_bg = false)
    {
        if ($have_html && !$have_bg){
            return "<div class='msg'>
            <span class='fa fa-close'></span><span class='alert alert-warning'>$msg</span>
        </div> ";
        }
        else if($have_html && $have_bg){
            return "<div class='msg' style='background: #CC0000;color: #fffddd;'>
            <span class='error'>$msg</span>
        </div> ";
        }
        return $msg;
    }

    public static function ShowSuccessMessage($msg, $have_html = true)
    {
        if ($have_html){
            return "<div class='msg w960' style='display: inline-block;padding: 10px;color: white;'>
            <span class='fa fa-check-circle'></span><span class='alert alert-success'>$msg</span>
        </div> ";
        }
        return $msg;
    }

    public static function GetShortContent($str,$len){
        $pos = strpos($str,' ',$len);
        if($pos>0)
            return substr($str,0,$pos);
        return $str;
    }

    public static function LoadHeader(){
        $ci = &get_instance();
        $ci->load->model('categories_model');
        $ci->load->library('cache2');
        $name = 'categories_model_LoadHeader';
        if($header = $ci->cache2->get($name)){
            return $header;
        }
        $results = categories_model::SelectAllParent();
        $arr = array();
        $i=0;
        foreach($results as $rs){
            $arr[$i] = array(
                'name'=>$rs->name,
                'slug'=>$rs->slug,
                'level'=>1
            );
            $sub = categories_model::SelectByParentId($rs->id);
            if($sub){
                $j=0;
                foreach($sub as $sb){
                    $arr[$i]['sub'][$j] = array(
                        'name'=>$rs->name,
                        'slug'=>$rs->slug,
                        'level'=>2
                    );
                }
                $j++;
            }
            $i++;
        }
        $ci->cache2->write($arr,$name,3600*24*30);
        return $arr;
    }

    public static function GetImgSrc($html){
        $doc = new DOMDocument();
        $doc->loadHTML($html);

        $tags = $doc->getElementsByTagName('img');
		$rs = array();
        foreach ($tags as $tag) {
            $src = $tag->getAttribute('src');
            if(!empty($src))
                $rs[]=$src;
        }

        return $rs;
    }
}



