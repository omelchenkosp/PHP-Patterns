<?php
// Singleton
// возвращает один и тот же объект.
// приватный конструктор __construct
// приватный клон __clone
// static private $_instance;

class Logger
{
	const LOG_NAME = "control.log";
	static private $_instance;
	private function __construct() {}
	private function __clone() {}

	static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self;
		}
		return self::$_instance;
	}

	function log($msg)
	{
		file_put_contents(self::LOG_NAME, $msg."\r\n", FILE_APPEND);
	}
}

$log = Logger::getInstance();
$log->log("Контрольная точка в строке ".__LINE__);

$conf = Logger::getInstance();
$conf->log("Контрольная точка в строке ".__LINE__);