<?php


class DatabaseObject {
  
static protected $database;
static protected $table_name;
static protected $columns = [];
public $errors = [];  

// this is function that sets the database connection to open
static public function set_database($database){
  self::$database = $database;
}


// this function is classed by the find_all() function it returns an object array
// setup to match the database
static public function find_by_sql($sql) {
  $result = self::$database->query($sql);
  if(!$result) {
    exit("Database query failed.");
  }
  //convert result into object
    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = static::instantiate($record);
    }
    $result->free();
    return $object_array;
}


// CRUD --- READ the database
static public function find_all() {
      $sql = "SELECT * FROM " . static::$table_name;
      return static::find_by_sql($sql);
}


static public function find_by_id($id) {
  $sql = "SELECT * FROM " . static::$table_name;
  $sql .= " WHERE ". static::$table_name . "id='" . self::$database->escape_string($id) . "'";
  $obj_array = static::find_by_sql($sql);
  if(!empty($obj_array)){
      return array_shift($obj_array);
    }else {
      return false;
    }
  }


// this function loops through the object array to set the association between the property and value.
static protected function instantiate($record) {
  $object = new static;
  foreach($record as $property => $value) {
    if(property_exists($object, $property)) {
      $object->$property = $value;
    }
  }
  return $object;
}



public function create() {
  $attributes = $this->sanitized_attributes();
  $sql = "INSERT INTO " . static::$table_name . " (";
  $sql .= join(', ', array_keys($attributes));
  $sql .= ") VALUES ('";
  $sql .= join("', '", array_values($attributes));
  $sql .= "')";
  $result = self::$database->query($sql);
  if($result){
    $this->id = self::$database->insert_id;
  }
  return $result;     //true or false if sucessful
}


public function update($id) {
  $attributes = $this->sanitized_attributes();
  $attribute_pairs = [];
  foreach($attributes as $key => $value){
    $attribute_pairs[] = "{$key}='{$value}'";
  }


  $sql = "UPDATE "  . static::$table_name . " SET ";
  $sql .= join(', ', $attribute_pairs);
  $sql .= " WHERE ". static::$table_name . "id='" . $id . "'";//self::$database->escape_string($this->userid) . "'";
  $result = self::$database->query($sql);
  return $result;
}


public function save() {

  //new record does not have an id
  if(isset($this->id)) {
    return $this->update();
  } else {
    return $this->create();
  }
}


public function merge_attributes($args=[]) {
  foreach($args as $key => $value) {
    if(property_exists($this, $key) && !is_null($value)) {
      $this->$key = $value;
    }
  }
}


//properties excluding id
public function attributes() {
  $attributes = [];
  $newid = static::$table_name . 'id';
  foreach(static::$db_columns as $column){
    if($column == $newid) { continue; }
    $attributes[$column] = $this->$column;
  }
  return $attributes;
}


protected function sanitized_attributes() {
  $sanitized = [];
  foreach($this->attributes() as $key => $value) {
    $sanitized[$key] = self::$database->escape_string($value);
  }
  return $sanitized;
}


public function delete($id) {
  $sql = "DELETE FROM " . static::$table_name;
  $sql .=" WHERE ". static::$table_name . "id='" . $id . "'";// self::$database->escape_string($this->userid) . "'";
  $sql .=" LIMIT 1";
  $result = self::$database->query($sql);
  return $result;
}

// ------ end of active record code --------- 
  
  
}



?>