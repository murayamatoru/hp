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
            'host' => 'fk-nextdesign.sakura.ne.jp',
            'port' => 587,
            'from' => 'toiawase@fk-nextdesign.sakura.ne.jp',
            'protocol' => 'SMTP_AUTH',
            'user' => 'toiawase',
            'pass' => 'next3148'
        );
        $mail -> smtpServer($param);
        $mail->to($mailAddress);
        $mail->from('toiawase@fk-nextdesign.sakura.ne.jp', Constants::SITE_NAME . ' フォームメール');
        $mail->subject($subject);
        $mailText = "フォームメール\n";
        $mailText .= $mailMessage;
        $mail->text($mailText);
        $resut = $mail->send();
        //$this->sendLog($mailAddress, "問合せあり"); //ログ
        return $resut;
    }
}