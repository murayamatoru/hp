<?php
error_reporting(0);
require_once dirname ( __FILE__ ) . '/../Constants.php';
require_once (dirname(__FILE__) . '/qdmail.php');
require_once (dirname(__FILE__) . '/qdsmtp.php');
/**
 * メーラー
 */
class Mailer{
    
    //ピアノ教室問合せ通知メールを送信する
    public function sendPiano($mailAddress, $mailMessage = ""){
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
        $mail->from('info@nextdesign.co.jp', Constants::SITE_NAME);
        $mail->subject(Constants::SITE_NAME . "に問合せがありました。");
        $mailText = Constants::SITE_NAME . "に問合せがありました。\n";
        $mailText .= $mailMessage;
        $mail->text($mailText);
        $resut = $mail->send();
        //$this->sendLog($mailAddress, "問合せあり"); //ログ
        return $resut;
    }
    
    //仮登録画面通知メールを送信する
    public function sendTemporaryEngineerMessage($mailAddress, $temporayKey){
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
        if ($this->isLocalHost()){
            $mail->to( Constants::TEST_MAIL_ADDRESS);
        } else {
            $mail->to($mailAddress);
        }
        $mail->from('info@nextdesign.co.jp', Constants::SITE_NAME);
        $mail->subject(Constants::SITE_NAME . "からのお知らせです");
        $mailText = "\n" . Constants::SITE_NAME . "からのお知らせです。\n\n";
        $mailText .= "技術者用登録・編集画面(登録/更新/削除)のリンク先は以下です。\n\n";
        if ($this->isLocalHost()){
            $mailText .= "http://localhost/app/views/registration/edit.php?" . Keys::TEMP_KEY . "=". $temporayKey;
        } else {
            $mailText .= "http://www.nextdesign.co.jp/app/views/registration/edit.php?" . Keys::TEMP_KEY . "=". $temporayKey;
        }
        $mailText .= "\n\n※このメールにお心当たりが無い場合は、このままこのメールを削除して頂くようお願いいたします。\n\n";
        $mailText .= "以上";
        $mail->text($mailText);
        $resut = $mail->send();
        $this->sendLog($mailAddress, "技術者登録・編集画面URL要求"); //ログ
        return result;
    }
    
    //仮登録画面通知メールを送信する
    public function sendRequesterMessage($mailAddress, $temporayKey){
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
        if ($this->isLocalHost()){
            $mail->to( Constants::TEST_MAIL_ADDRESS);
        } else {
            $mail->to($mailAddress);
        }
        $mail->from('info@nextdesign.co.jp', Constants::SITE_NAME);
        $mail->subject(Constants::SITE_NAME . "からのお知らせです");
        $mailText = "\n" . Constants::SITE_NAME . "からのお知らせです。\n\n";
        $mailText .= "技術者宛て問合せメール送信画面のリンク先は以下です。\n\n";
        if ($this->isLocalHost()) {
            $mailText .= "http://localhost/app/views/message/editRequest.php?" . Keys::TEMP_KEY . "=" . $temporayKey;
        } else {
            $mailText .= "http://www.nextdesign.co.jp/app/views/message/editRequest.php?" . Keys::TEMP_KEY . "=" . $temporayKey;
        }
        $mailText .= "\n\n※このメールにお心当たりが無い場合は、このままこのメールを削除して頂くようお願いいたします。\n\n";
        $mailText .= "以上";
        $mail->text($mailText);
        $resut = $mail->send();
        $this->sendLog($mailAddress, "問合せ画面URL要求");
        return result;
    }
    
    //指定された技術者に問合せメールを送信する
    public function sendRequestEngineerMessage( $mailAddress, $replyTo, $text1 ){
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
        if ($this->isLocalHost()){
            $mail->to( Constants::TEST_MAIL_ADDRESS);
        } else {
            $mail->to($mailAddress);
        }
        $mail->from('info@nextdesign.co.jp', Constants::SITE_NAME);
        $mail->subject(Constants::SITE_NAME . " 問合せメールです");
        $mailText = "\n" . Constants::SITE_NAME . " 技術者をお探しの方からの問合せメールです。\n\n";
        $mailText .= "[返信先]\n";
        $mailText .= $replyTo . "\n\n";
        $mailText .= "[本文]\n";
        $mailText .= $text1 . "\n\n";
        $mailText .= "[以上]\n\n";
        $mailText .= "本サイトでのサポートはここまでです。上記の返信先に直接ご回答ください。\n";
        $mailText .= "お問合せにはすみやかにご回答をお送り頂きますようご協力をお願いたします。\n\n";
        $mailText .= "※このメールにお心当たりが無い場合は、このままこのメールを削除して頂くようお願いいたします。\n\n";
        $mailText .= "以上";
        $mail->text($mailText);
        $resut = $mail->send();
        $this->sendLog($replyTo, "問合せ送信済み", $mailAddress, $text1);
        return result;
    }
    
    // 保守ログメールを送信する
    private function sendLog($userMailAddress, $logTitle, $sendTo = "", $text1 = "") {
        $mail = new Qdmail ();
        $mail->errorDisplay ( false );
        $mail->smtp ( true );
        $param = array (
            'host' => 'smtp.nextdesign.co.jp',
            'port' => 587,
            'from' => 'info@nextdesign.co.jp',
            'protocol' => 'SMTP_AUTH',
            'user' => 'info',
            'pass' => 'Next3148@'
        );
        $mail->smtpServer ( $param );
        $mail->to ( 'info@nextdesign.co.jp' );
        $mail->from ( 'info@nextdesign.co.jp', Constants::SITE_NAME );
        $mail->subject ( Constants::SITE_NAME . " ログ" );
        $mailText = "\nログ情報\n\n";
        $mailText .= $logTitle. "\n\n";
        $mailText .= "[利用者]\n";
        $mailText .= $userMailAddress. "\n\n";
        if ($sendTo != "") {
            $mailText .= "[問合せ先]\n";
            $mailText .= $sendTo . "\n\n";
            $mailText .= "[メッセージ]\n";
            $mailText .= $text1 . "\n\n";
        }
        $mailText .= "以上";
        $mail->text ( $mailText );
        return $mail->send ();
    }
    
    private function isLocalHost(){
        return $_SERVER["HTTP_HOST"] == "localhost";
    }
    
}