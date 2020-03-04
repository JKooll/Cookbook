<?php
class Logger
{
  private static $logger = null;

  private function __construct()
  {

  }

  public static function getInstance()
  {
    if (is_null(self::$logger)) {
      self::$logger = new Logger;
    }

    return self::$logger;
  }

  public function __clone()
  {
    die('Clone is not allowed. ' . E_USER_ERROR);
  }

  public function log($msg)
  { 
    echo time() . ": " . $msg;
  }
}