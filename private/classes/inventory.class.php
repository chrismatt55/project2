<?php

class Inventory extends DatabaseObject {

static protected $table_name = 'inventory';
static protected $db_columns = ['inventoryid', 'inventoryamt'];

public $inventoryid;
public $inventoryamt



// construct method
public function __construct($args=[]) {
  $this->inventoryid = $args['inventoryid'] ?? NULL;
  $this->inventoryamt = $args['inventoryamt'] ?? '';
  
}

// remember to return out a value since this is a function.
static public function find_inventory($id) {
		$sql = "SELECT * FROM inventory";
		$sql .= " Where inventoryid='" . $id . "'";
		return static::find_by_sql($sql);
	}


}
?>
