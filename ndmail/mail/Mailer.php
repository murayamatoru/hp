<?php
error_reporting(0);
require_once dirname ( __FILE__ ) . '/../Constants.php';
require_once (dirname(__FILE__) . '/qdmail.php');
require_once (dirname(__FILE__) . '/qdsmtp.php');
/**
 * メーラー
 */
class Mailer{
    
    //メールを送信する
    public function sendInfo($mailAddress, $mailMessage = "", $subject = ""){
        $mail = new Qdmail();
        $mail -> errorDisplay( false );
        $mail -> smtp( true );
        $param = array(
            'host' => 'smtp.nextdesign.co.jp',
            'port' => 587,
            'from' => 'info@nextdesign.co.jp',
            'protocol' => 'SMTP_AUTH',
            'user' => 'info',
            'pass' => 'Next3148@'
        );
        $mail -> smtpServer($param);
        $mail->to($mailAddress);
        $mail->from('info@nextdesign.co.jp', Constants::SITE_NAME . ' フォームメール');
        $mail->subject($subject);
        $mailText = "フォームメール\n";
        $mailText .= $mailMessage;
        $mail->text($mailText);
        $resut = $mail->send();
        //$this->sendLog($mailAddress, "問合せあり"); //ログ
        return $resut;
    }
}