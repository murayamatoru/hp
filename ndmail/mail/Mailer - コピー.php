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
        return $resut;
    }
}