<?php
class StringUtil {
	
	const CRLF = "\r\n";
	const CR = "\r";
	const LF = "\n";
	const BR = "<br>";
	
	/**
	 * 改行を<br>に置き換える
	 * @param unknown $str
	 * @return mixed
	 */
	public static function replaceCRLFToBR($str){
		$result = str_replace(self::CRLF, self::BR, $str);
		$result = str_replace(self::CR, self::BR, $result);
		$result = str_replace(self::LF, self::BR, $result);
		return $result;
	}
	
	/**
	 * 半角カタカナを全角カタカナ, 全角英数字を半角, toUppercaseに変換する
	 * @param unknown $param
	 * @return string
	 */
	public static function toUpperCase($param) {
		$result = mb_convert_kana ( $param, "KVa", "utf-8" );
		$result = strtoupper ( $result );
		return $result;
	}
	
	const COMMA = ", ";
	
	//配列要素をカンマ区切りで結合する
	public static function joinWithComma($paramArray){
		$result = "";
		if (count($paramArray) > 0){
			foreach ($paramArray as $item){
				$result .= $item . self::COMMA;
			}
		}
		if (self::endsWith($result, self::COMMA)){
			$result = mb_substr ( $result, 0, (mb_strlen ($result) - mb_strlen (self::COMMA)) );
		}
		return $result;
	}
	
	// startsWith
	public static function startsWith($haystack, $needle) {
		return (strpos ( $haystack, $needle ) === 0);
	}
	
	// endsWith
	public static function endsWith($haystack, $needle) {
		return (strrpos ( $haystack, $needle ) === strlen ( $haystack ) - strlen ( $needle ));
	}
}