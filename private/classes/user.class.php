<?php

class User extends DatabaseObject {

static protected $table_name = 'user';
static protected $db_columns = ['userid', 'userName', 'password', 'firstName'];

public $userid;
public $userName;
public $password;
public $firstName;

// construct method
public function __construct($args=[]) {
  $this->userid = $args['userid'] ?? NULL;
  $this->userName = $args['userName'] ?? '';
  $this->password = $args['password'] ?? '';
  $this->firstName = $args['firstName'] ?? '';
 }

 static public function find_by_username($userName, $password){
 	$sql = "SELECT * FROM " . static::$table_name;
 	$sql .= " WHERE userName='" . self::$database->escape_string($userName) ."' AND password='" . self::$database->escape_string($password) ."'";
 	$obj_array = static::find_by_sql($sql);
 	if(!empty($obj_array)){
 		return array_shift($obj_array);
 	}else {
 		return false;
 	}
 }
}
?>
