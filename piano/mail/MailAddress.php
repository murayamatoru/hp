<?php
/**
 * メールアドレス
 * qdmail.php, qdsmtp.phpをrequire_onceするとphp5.3では警告が出るので, Mailerとは別クラスにした。
 */
class MailAddress{
	
	const MAX_LENGTH = 100;
	
	//メールアドレス形式として妥当か否か
	public static function validate($mailAddress){
		$result = "";
		if (mb_strlen($mailAddress) > self::MAX_LENGTH){
			$result = self::MAX_LENGTH . "文字までです。";
		} else  if ( !(($mailAddress != null) && (preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $mailAddress)))){
			$result = "メールアドレスは間違っています。";
		}
		return $result;
	}
}