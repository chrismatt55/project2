<?php

class Inventory extends DatabaseObject {

static protected $table_name = 'inventory';
static protected $db_columns = ['inventoryid', 'inventoryamt'];

public $inventoryid;
public $inventoryamt



// construct method
public function __construct($args=[]) {
  $this->contractid = $args['contractid'] ?? NULL;
  $this->paymentDate = $args['paymentDate'] ?? '';
  $this->contractLength = $args['contractLength'] ?? '';
  $this->paymentAmt = $args['paymentAmt'] ?? '';
  $this->blogid = $args['blogid'] ?? '';
}

// remember to return out a value since this is a function.
static public function find_contract($id) {
		$sql = "SELECT * FROM contract";
		$sql .= " Where blogid='" . $id . "'";
		return static::find_by_sql($sql);
	}


}
?>
