<?php
class Logger {
	const DEBUG_PRINT = false;
	public static function put($line) {
		if (self::DEBUG_PRINT) {
			print "ログ：" . $line . "<br>";
		}
	}
}