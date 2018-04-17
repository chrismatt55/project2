<?php

class Invoice extends DatabaseObject {

static protected $table_name = 'invoice';
static protected $db_columns = ['invoiceid', 'receiveDate', 'manufacturer', 'referenceNum', 'amt'];

public $invoiceid;
public $receiveDate;
public $manufacturer;
public $referenceNum;
public $amt;


// construct method
public function __construct($args=[]) {
  $this->invoiceid = $args['invoiceid'] ?? NULL;
  $this->receiveDate = $args['receiveDate'] ?? '';
  $this->manufacturer = $args['manufacturer'] ?? '';
  $this->referenceNum = $args['referenceNum'] ?? '';
  $this->amt = $args['amt'] ?? '';
 
 }
 static public function find_invoice($id) {
		$sql = "SELECT * FROM invoice";
		$sql .= " Where invoiceid='" . $id . "'";
		return static::find_by_sql($sql);
	}
  
}






?>
