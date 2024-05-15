<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 12/18/2015
 * Time: 6:04 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public static function SendGrid($subject, $message, $receiver, $sender_address = '', $sender_name = 'InClass.VN', $cc_address = NULL, $bcc_address = NULL)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'khongthenoi',
            'smtp_pass' => 'tr4nd4ngkh04',
            'smtp_port' => 587,
            'Content-Type'=>'text/html',
            'mailtype' => 'html',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        get_instance()->load->model('Email');
        $email = new CI_Email($config);
        $email->from('hotro@inclass.edu.vn', $sender_name);
        $email->to($receiver);
        $email->subject($subject);
        $email->message($message);
        if(!empty($cc_address))
            $email->cc($cc_address);
        if(!empty($bcc_address))
            $email->bcc($bcc_address);
        try{
            return $email->send();
        }
        catch(Exception $e){
            return false;
        }
    }

	public static function SendMailJet($receiver, $subject, $message, $sender_name = 'Penjunior', $sender_address = 'hotro@penjunior.com', $cc = null, $bcc= null)
	{
		$config = array(
			'protocol' => 'smtp',
			'host' => 'in-v3.mailjet.com',
			'username' => 'cd2268b61929376e6d55fd9961b04e03',
			'password' => 'c9c9bf22179624e79cda0585b9978512',
			'smtp_port' => 587,
			'Content-Type'=>'text/html',
			'mailtype' => 'html',
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);

		get_instance()->load->library('aws_ses_mailer/PHPMailer');
		$mail = new PHPMailer();

		$mail->IsSMTP();
		$mail->Timeout = 20;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "tls";
		$mail->Host       = $config['host'];
		$mail->Username   = $config['username'];
		$mail->Password   = $config['password'];
		$mail->CharSet = 'UTF-8';
		$mail->Subject = $subject;
		$body = preg_replace('[]','',$message);
		$mail->SetFrom('no-reply@datnhabe.vn', $sender_name);
		$mail->MsgHTML($body);
		$mail->AddAddress($receiver);
		if ($cc!=null) {
			if (is_array($cc)){
				foreach($cc as $c){
					$mail->addCC($c);
				}
			}else{
				$mail->AddCC($cc);
			}

		}

		if ($bcc != null){
			if (is_array($bcc)) {
				foreach ($bcc as $b) {
					$mail->addBCC($b);
				}
			}else{
				$mail->addBCC($bcc);
			}
		}

		$mail->SMTPDebug  = 0;
		$mail->Port = 587;
		$is_success = $mail->Send();
		$mail->SmtpClose();
		return $is_success;
	}

    public static function SendAmazon($receiver, $subject, $message, $sender_name = 'Penjunior', $sender_address = 'hotro@penjunior.com', $cc = null, $bcc= null)
    {
        /*SES User:  ses-smtp-user-inclass.vn*/
        $config = array(
            'host'      => 'email-smtp.us-west-2.amazonaws.com',
            'username'  => 'AKIAILKOCAKBKTM43MHQ', 
            'password'  => 'AsXnmaA/YwVcb0BHoDxYhZz+UyEiEbTgaONpu9PFtSwf',
            //'verify_email'  => 'hotro@penjunior.com'
            'verify_email'  => 'support@techdev.vn'
        );
        //
        get_instance()->load->library('aws_ses_mailer/PHPMailer');
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->Timeout = 20;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host       = $config['host'];
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $body = preg_replace('[]','',$message);
        $mail->SetFrom($config['verify_email'], $sender_name);
        $mail->MsgHTML($body);
        $mail->AddAddress($receiver);
        if ($cc!=null) {
            if (is_array($cc)){
                foreach($cc as $c){
                    $mail->addCC($c);
                }
            }else{
                $mail->AddCC($cc);
            }

        }

        if ($bcc != null){
            if (is_array($bcc)) {
                foreach ($bcc as $b) {
                    $mail->addBCC($b);
                }
            }else{
                $mail->addBCC($bcc);
            }
        }

        $mail->SMTPDebug  = 0;
        $mail->Port = 587;
        $is_success = $mail->Send();        
        $mail->SmtpClose();
        return $is_success;


    }


    private static function LayoutContent($tpl_name, $data)
    {
        $temp['template'] = 'email_tpl/email_body/' . $tpl_name;
        $temp['data']     = $data;
        return get_instance()->load->view('email_tpl/email_layout/email_layout_view', $temp, TRUE);
    }


    /**
     * @param $user: Object Select From User_model
     */
    public static function ForgotPassword($user, $link)
    {
        $subject    = '[Penjunior.com] Khôi phục mật khẩu';
        $message    = self::LayoutContent('tpl_forgot_password', array('user' => $user, 'link' => $link) );        
        self::SendAmazon($user->email, $subject, $message );
    }

    public static function VerifyAccount($user, $link)
    {
        $subject = '[Penjunior.com] Xác nhận tài khoản ';
        $message = self::LayoutContent('tpl_verify_account', array('user'=> $user, 'link' => $link));
        self::SendAmazon($user->email, $subject, $message );
    }

    public static function SendMailBlog($mail, $link,$title,$fullname)
    {
        $subject    = '[Penjunior.com] Bài viết';
        $message    = self::LayoutContent('tpl_blog', array('link' => $link,'title' => $title, 'fullname' => $fullname,) );
        self::SendAmazon($mail, $subject, $message );
    }




}
