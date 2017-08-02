<?php

class DB{
  private static $host = 'localhost';
  private static $banco = 'znradiadores';
  private static $user = 'root';
  private static $pass = 'Dado201094';
  private static $instance;

  public static function getInstance(){
    if(!isset(self::$instance)){
      try {
        self::$instance = new PDO('mysql:host='.self::$host.';dbname='.self::$banco,self::$user,self::$pass);
        self::$instance->exec("set names utf8");
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
      } catch (PDOException $e) {
        throw new PDOException($e);
      }
    }
    return self::$instance;
  }

  public static function prepare($sql){
    return self::getInstance()->prepare($sql);
  }
}
 ?>
