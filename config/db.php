<?php 

class Database{
 public static function connect(){
  $db = new mysqli('localhost', 'root', 'root', 'php_tienda_master');
  $db->query("SET NAMES 'utf8'");
  return $db;
 }
}